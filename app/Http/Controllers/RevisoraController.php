<?php

namespace App\Http\Controllers;

use App\Models\Revisora;
use App\Models\usuario;
use Illuminate\Http\Request;

class RevisoraController extends Controller
{

    public function index(){
        $tabela = Revisora::orderby('id', 'desc')->paginate();
        return view('painel-admin.revisoras.index', ['itens' => $tabela]);
    }

    public function create(){
        return view('painel-admin.revisoras.create');
    }


    public function insert(Request $request){
        $tabela = new Revisora();
        $tabela->nome = $request->nome;
        $tabela->matricula = $request->matricula;
        $tabela->funcao = $request->funcao;
        $tabela->nivel = $request->funcao;
        $tabela->situacao = $request->situacao;
        $tabela->email = $request->email;

        $tabela2 = new usuario();
        $tabela2->nome = $request->nome;
        $tabela2->matricula = $request->matricula;
        $tabela2->funcao = $request->funcao;
        $tabela2->nivel = $request->funcao;
        $tabela2->situacao = $request->situacao;
        $tabela2->email = $request->email;

        $itens = Revisora::where('matricula', '=', $request->matricula)->orwhere('email', '=', $request->email)->count();
        if($itens > 0 ){
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.revisoras.create');
            
            
        }

        $tabela->save();
        $tabela2->save();
        return redirect()->route('revisoras.index');

    }

    public function edit(Revisora $item){
        return view('painel-admin.revisoras.edit', ['item' => $item]);   
     }
 
 
     public function editar(Request $request, Revisora $item){
         
        $item->nome = $request->nome;
        $item->matricula = $request->matricula;
        $item->funcao = $request->funcao;
        $item->nivel = $request->funcao;
        $item->situacao = $request->situacao;
        $item->email = $request->email;
       

        $oldmatricula = $request->oldmatricula;
        $oldemail = $request->oldemail;

        if($oldmatricula != $request->matricula){
            $itens = Revisora::where('matricula', '=', $request->matricula)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Matricula já Cadastrada!')</script>";
                return view('painel-admin.revisoras.edit', ['item' => $item]);   
                
            }
        }

        if($oldemail != $request->email){
            $itens = Revisora::where('email', '=', $request->email)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Email já Cadastrado!') </script>";
                return view('painel-admin.revisoras.edit', ['item' => $item]);   
                
            }
        }
       

        $item->save();
         return redirect()->route('revisoras.index');
 
    }

     public function delete(Revisora $item){
        $item->delete();
        return redirect()->route('revisoras.index');
    }

     public function modal($id){
        $item = Revisora::orderby('id', 'desc')->paginate();
        return view('painel-admin.revisoras.index', ['itens' => $item, 'id' => $id]);

    }
}