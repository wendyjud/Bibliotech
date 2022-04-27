<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Response;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MobileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// MOBILE
Route::get('/cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/mobilelog', function () {
    return view('mobile.login');
})->name('mobilelog');


Route::post('/AuthMobile', [AuthController::class, 'AuthMobile'])->name('AuthMobile');

Route::get('/outMobile', [AuthController::class, 'outMobile'])->name('outMobile');


route::get('panelMobile', function () {
    $loans = DB::table('loans')->where('id', Auth::user()->id)->where('status', '!=', 3)->get();
     return view('mobile.dashboard')->with('loans', $loans);
 })->middleware('auth')->name('panelMobile');

// WEB
Route::get('/', function () {
    return view('index');
})->name('login');

route::get('dashboards', function () {
   $users = DB::table('users')->paginate(3);
    return view('users')->with('users', $users);
})->middleware('auth')->name('dashboards');

Route::post('/Auth', [AuthController::class, 'Authenticate'])->name('Auth');

Route::get('/out', [AuthController::class, 'out'])->name('out');

// Libros

Route::get('/books', function () {
    $books = DB::table('books')->paginate(3);
    return view('books')->with('books', $books);
})->middleware('auth')->name('books');

//ORIGINAL
Route::post('/book_search', [BookController::class, 'search'])->name('book_search');


Route::get('/book_delete/{id}', [BookController::class, 'delete'])->name('book_delete');

Route::get('/addbook', function () {
    return view('addbook');
  })->name('addbook');

Route::post('/book_create', [BookController::class, 'create'])->name('book_create');


//prestamos


Route::get('/loan_end/{id}', [BookController::class,'end'])->name('loan_end');
Route::get('/loan_print/{id}', [BookController::class, 'print'])->name('loan_print');

Route::get('/loans', function () {
    $loans = DB::table('loans')->where('status', '!=', '3')->paginate(3);
    return view('loans')->with('loans', $loans);
})->middleware('auth')->name('loans');

Route::get('/book_loans/{id}', [BookController::class, 'loan'])->name('book_loans');

Route::post('/loan_create', [BookController::class, 'create_loan'])->name('loan_create');

//pdf

Route::get('/multa/{id}', function ($id) {

    // https://github.com/dompdf/dompdf

    $loans = DB::table('loans')->where('id', $id)->first();
 //   $pdf = PDF::loadView('multa')->with('loans', $loans);

    $view = view('multa')->with('loans', $loans);
    $html = $view->render();
    $pdf = PDF::loadHTML($html);

    return $pdf->download('multa.pdf');
  })->name('multa');

// Usuarios Estudiantes

Route::get('/users', function () {
      $users = DB::table('users')->paginate(3);
      return view('users')->with('users', $users);
  })->middleware('auth')->name('users');

  Route::get('users/search', [UserController::class, 'search']);

  Route::get('books/search', [BookController::class, 'search']);

  Route::get('loans/search', [BookController::class, 'loans_search']);
  
  Route::get('/adduser', function () {
      return view('adduser');
    })->name('adduser');

 

      Route::get('/edituser/{id}', [UserController::class, 'edit'])->name('edituser');

      Route::get('/viewuser/{id}', [UserController::class, 'view'])->name('viewuser');

Route::post('/user_create', [UserController::class, 'create'])->name('user_create');

Route::post('/user_search', [UserController::class, 'search'])->name('user_search');

Route::post('/user_searchname', [UserController::class, 'searchname'])->name('user_searchname');

Route::post('/user_update', [UserController::class, 'update'])->name('user_update');

Route::get('/user_delete/{id}', [UserController::class, 'delete'])->name('user_delete');

// Empleados

Route::get('/employees', function () {
    $employees = DB::table('workers')->get();
    return view('employees')->with('employees', $employees);
})->middleware('auth')->name('employees');

Route::post('/employee_create', [EmployeeController::class, 'create'])->name('employee_create');

Route::post('/employee_update', [EmployeeController::class, 'update'])->name('employee_update');

Route::get('/employee_delete/{id}', [EmployeeController::class, 'delete'])->name('employee_delete');


// Pagos 

Route::get('/pagos', function () {
    $loans = DB::table('loans')->where('code_user', '00000000000')->get();

    return view('pagos')->with('loans', $loans);
  })->name('pagos');

Route::post('/pagos_search', [UserController::class, 'pagos_search'])->name('pagos_search');



// Payment

Route::get('/paypal/pay/{id}', [PaymentController::class, 'payWithPayPal']);

Route::get('/paypal/pagostatus/{id}', [PaymentController::class, 'pagostatus']);
 
// Get file

Route::get('getfile/{folder}/{file}', function ($folder, $file) {
    $filename = $file;
    $isset = Storage::disk($folder)->exists($filename);

    if ($isset) {
        $file = Storage::disk($folder)->get($filename);
        return new Response($file, 200);
    } else {
        return response()->json(['message' => 'La foto no existe'], 404);
    }
})->name('getfile');