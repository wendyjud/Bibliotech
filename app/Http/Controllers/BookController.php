<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use PDF;

class BookController extends Controller
{

    public function create_loan(Request $request){

             // return $request;
              $credentials = $request->validate([
                'codigo' => ['required'],
                'dia' => ['required'],
                'idbook' => ['required'],
            ]);
    
           $usuario = DB::table('users')->where('code', $request->codigo)->first();

           $loan = DB::table('loans')->where('status', '!=', 3)->where('code_user', $request->codigo)->first();       

           if($usuario && !$loan){
            DB::table('loans')->insert([
                'code_user' => $request->codigo,
                'id_book' => $request->idbook,
                'date' => $request->dia,
                'type' => $usuario->type,
                'status' => '1',                
            ]);
        }else{
            return back()->withErrors([
                'email' => 'error',
            ]);
        }


            return redirect('loans');
        
    }

    public function create(Request $request){

        //return $request;
        $credentials = $request->validate([
            'isbn' => ['required'],
            'titulo' => ['required'],
            'autor' => ['required'],
            'editorial' => ['required'],
            'ano' => ['required'],
            'numero' => ['required'],
            'edicion' => ['required'],
        ]);


        DB::table('books')->insert([
            'isbn' => $request->isbn,
            'title' => $request->titulo,
            'author' => $request->autor,
            'editorial' => $request->editorial,
            'year_of_publication' => $request->ano,
            'issue_number' => $request->numero,
            'edition' => $request->edicion
            
        ]);

        return redirect()->back()->with('success', 'Se ha agregado');  
    }

    public function delete($id){
        DB::table('books')->where('isbn', $id)->delete();
        return redirect()->back()->with('success', 'Se ha eliminado');
    }

    public function end($id){
        DB::table('loans')->where('id', $id)->update(['status' => '3']);
        return redirect()->back()->with('success', 'Se ha entregado');
    }

    public function print($id){
        // DB::table('loans')->where('id', $id)->update(['status' => '3']);
        return redirect()->back()->with('success', 'Se ha entregado');
    }

    public function loan($id){
        $loans = DB::table('loans')->where('id_book', $id)->where('status','1')->first();

        if($loans){
            return redirect()->back()->with('error', 'error');
        }

        $loans = DB::table('loans')->where('id_book', $id)->where('status','2')->first();

        if($loans){
            return redirect()->back()->with('error', 'error');
        }

        return view('addloans')->with('id',$id);
    }

    public function loans_search(Request $request){
        $loans = DB::table('loans')->where('id_book','like', $request->text."%")->paginate(4);
        return view("loans.pages",compact("loans"));
    }

    public function search(Request $request){
        //CORRECIÓN (cambio por Wendy)
            $books = DB::table('books')->where('isbn','like',"%".$request->text."%")
            ->orWhere('title' ,'like',"%".$request->text."%")
            ->orWhere('author' ,'like',"%".$request->text."%")
            ->orWhere('editorial' ,'like',"%".$request->text."%")
            ->orWhere('year_of_publication' ,'like',"%".$request->text."%")
            ->paginate(4);
            return view("books",compact("books"));    
       
    }
}
