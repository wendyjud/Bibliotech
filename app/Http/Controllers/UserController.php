<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function create(Request $request){

        //return $request;
        $credentials = $request->validate([
            'nombre' => ['required'],
            'apellidos' => ['required'],
            'codigo' => ['required'],
            'tipo' => ['required'],
            'carrera' => ['required'],
            'telefono' => ['required'],
        ]);

        $img = 'img.png';

        if($request->img){
            $img = $request->file('img');

            $img = $img->store('/img');
        }

        DB::table('users')->insert([
            'name' => $request->nombre,
            'lastname' => $request->apellidos,
            'code' => $request->codigo,
            'type' => $request->tipo,
            'degree' => $request->carrera,
            'phone' => $request->telefono,
            'password' => bcrypt('asdf1234'),
            'img' => $img
            // 'password' => bcrypt($request->contrasena),
        ]);

        return redirect()->back()->with('success', 'Se ha agregado');  
    }

    public function delete($id){
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Se ha eliminado');
    }

    public function edit($id){
        $user = DB::table('users')->where('id', $id)->first();
        return view('edituser')->with('user',$user);
    }

    public function update(Request $request){
        //return $request;
        $credentials = $request->validate([
            'nombre' => ['required'],
            'apellidos' => ['required'],
            'codigo' => ['required'],
            'telefono' => ['required'],
            'tipo' => ['required'],
            'carrera' => ['required'],
        ]);

        $img = 'img.png';

        if($request->img){
            $img = $request->file('img');

            $img = $img->store('/img');
        }

        DB::table('users')->where('id', $request->id)->update([
            'name' => $request->nombre,
            'lastname' => $request->apellidos,
            'code' => $request->codigo,
            'phone' => $request->telefono,
            'type' => $request->tipo,
            'degree' => $request->carrera,
            'img' => $img,
        ]);

        return redirect()->back()->with('success', 'Se ha modificado');  ;
    }

    public function view($id){
        $user = DB::table('users')->where('id', $id)->first();
        return view('user')->with('user',$user);
    }

    //CORRECCIÓN (cambio por wendy)

    public function searchname(Request $request){
        $users = DB::table('users')->where('name','like',"%".$request->text."%")
        ->orWhere('code','like',"%".$request->text."%")
        ->orWhere('lastname', 'like',"%".$request->text."%")
        ->orWhere('degree','like',"%".$request->text."%")
        ->paginate(4);
        return view('users')->with('users',$users);
    }

    public function search(Request $request){
        $users =  DB::table('users')->where("code",'like',$request->text."%")->take(5)->get();
        return view("users.pages",compact("users"));        
    }
    public function pagos_search(Request $request){
        $loans = DB::table('loans')->where('code_user', $request->text)->where('status', '2')->get();
        return view("pagos")->with("loans", $loans);
    }
}
