<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    //
    public function create(Request $request){

        $credentials = $request->validate([
            'nss' => ['required'],
            'nombre' => ['required'],
            'apellidos' => ['required'],
            'telefono' => ['required'],
            'rfc' => ['required'],
          
        ]);

        DB::table('workers')->insert([
            'nss' => $request->nss,
            'name' => $request->nombre,
            'lastname' => $request->apellidos,
            'phone' => $request->telefono,
            'rfc' => $request->rfc,
            'password' => bcrypt('asdf1234'),
        ]);
        return redirect()->back()->with('success', 'Se ha agregado');
    }

    public function delete($id){
        DB::table('workers')->where('phone', $id)->delete();
        return redirect()->back()->with('success', 'Se ha eliminado');
    }
}



 


