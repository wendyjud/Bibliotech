<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use DateTime;
use DateInterval;

use Illuminate\Support\Facades\DB;

use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

use PayPal\Exception\PayPalConnectionException;
use PayPal\Api\PaymentExecution;

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct(){
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
          )
    );

    $this->apiContext->setConfig($payPalConfig['settings']);
    }

    public function payWithPayPal($id){
$loan = DB::table('loans')->where('id', $id)->first();
// 
$oldDate = $loan->date;
$newDate = new DateTime($oldDate);
if($loan->type == 'Profesor'){
$newDate->add(new DateInterval('P14D')); // P1D means a period of 1 day
$tarifa = 20;
}
if($loan->type == 'Alumno'){
$newDate->add(new DateInterval('P7D')); // P1D means a period of 1 day
$tarifa = 10;
}
$fomattedDate = $newDate->format('Y-m-d');

$fechaActual = date('d-m-Y');

$inicio = strtotime($fomattedDate);
$hoy = strtotime($fechaActual);
$dias = $hoy-$inicio;
// 
$payer = new Payer();
$payer->setPaymentMethod('paypal');

$amount = new Amount();
$amount->setTotal(($dias/ 86400)*$tarifa);
$amount->setCurrency('MXN');

$transaction = new Transaction();
$transaction->setAmount($amount);
$transaction->setDescription('Pagar multa');

$callbackUrl = url('/paypal/pagostatus/'.$loan->id);
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl($callbackUrl)
    ->setCancelUrl($callbackUrl);

$payment = new Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);

  //  dd($this->apiContext);
    try {
        $payment->create($this->apiContext);
    
      return redirect()->away($payment->getApprovalLink()); //
    }
    catch (PayPalConnectionException $ex) {
//Hacer redirect
        echo $ex->getData();
    }
    }

    public function pagostatus(Request $request, $id){
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/paypal/failed')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            $status = 'Gracias! El pago de su multa se concreto.';
            return view('pagostatus')->with(compact('status'))->with('id', $id);
        }

        $status = 'Lo sentimos! El pago no se pudo realizar.';
        return view('pagostatus')->with(compact('status'))->with('id', $id);
    }
      
}
