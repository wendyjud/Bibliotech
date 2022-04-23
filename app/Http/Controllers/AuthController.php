<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Authenticate(Request $request)
    {
     
        
        $credentials = $request->validate([
            'code' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if(Auth::user()->admin == 0){
                return redirect('/out');
            }
            
                    return redirect('/dashboards');
                
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }


    public function AuthMobile(Request $request)
    {
     
        
        $credentials = $request->validate([
            'code' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            
                    return redirect('/panelMobile');
                
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    public function outMobile()
{
    Session::flush();
        
    Auth::logout();

    return redirect('/mobilelog');
   
}

//     public function Register(Request $request)
// {
//     $credentials = $request->validate([
//         'Nombre' => ['required'],
//         'Apellidos' => ['required'],
//         'Usuario' => ['required'],
//         'Telefono' => ['required'],
//         'Correo' => ['required'],
//     ])->withInput();

//    // return $request->Apellidos;
//   $validate1 = DB::table('users')->where("user", $request->Usuario)->first();
//   if($validate1->user == $request->Usuario){
//     return back()->withErrors([
//         'user' => 'El usuario ya fue registrado',
//     ])->withInput();
//   }
//   $validate2 = DB::table('users')->where("email", $request->Correo)->first();
//   if($validate2->email == $request->Correo){
//     return back()->withErrors([
//         'email' => 'El correo ya fue registrado',
//     ])->withInput();
// }

//     if ($credentials) {

//         $User = User::create([
//             'name' => $request->Nombre,
//             'lastname' => $request->Apellidos,
//             'user' => $request->Usuario,
//             'company_id' => Auth::user()->company_id,
//             'type' => '2',
//             'password' => $request->Rfc,
//             'phone' => $request->Telefono,
//             'rfc' => $request->Rfc,
//             'nss' => $request->Nss,
//             'email' => $request->Correo,
//         ]);
//         return back()->with('success', 'Se ha registrado un nuevo usuario');  
//     }


//     return back()->withErrors([
//         'email' => 'Revisa bien los datos del formulario',
//     ])->withInput();
// }

// public function DeleteUser($id)
// {

//     if(Auth::user()->type == 1 && Auth::user()->id != $id){
//     $validate = DB::table('users')->where("id", $id)->where('company_id', Auth::user()->company_id)->first();
//     if($validate){
// DB::table('investments')->where('id_user', $validate->id)->delete();
// DB::table('users')->where("id", $id)->delete();
// return back()->with('success', 'Se ha eliminado un usuario');
//     }
// }
// return back()->withErrors([
//     'Error' => 'Error',
// ]);
// }

public function out()
{
    Session::flush();
        
    Auth::logout();

    return redirect('/');
   
}
}
