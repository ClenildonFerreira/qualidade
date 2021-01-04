<?php

namespace App\Http\Controllers;

use App\Models\administradore;
use App\Models\usuario;
use Illuminate\Http\Request;

class CadAdministradorController extends Controller
{
    public function index(){
        $tabela = administradore::orderby('id', 'desc')->paginate();
        return view('painel-admin.administradores.index', ['itens' => $tabela]);
    }

    public function create(){
        return view('painel-admin.administradores.create');
    }


    public function insert(Request $request){
        $tabela = new administradore();
        $tabela->nome = $request->nome;
        $tabela->matricula = $request->matricula;
        $tabela->funcao = 'administrador';
        $tabela->nivel = 'admin';
        $tabela->situacao = $request->situacao;
        $tabela->email = $request->email;

        $tabela2 = new usuario();
        $tabela2->nome = $request->nome;
        $tabela2->matricula = $request->matricula;
        $tabela2->funcao = 'administrador';
        $tabela2->nivel = 'admin';
        $tabela2->situacao = $request->situacao;
        $tabela2->email = $request->email;

        $itens = administradore::where('matricula', '=', $request->matricula)->orwhere('email', '=', $request->email)->count();
        if($itens > 0 ){
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.administradores.create');
            
            
        }

        $tabela->save();
        $tabela2->save();
        return redirect()->route('administradores.index');

    }

    public function edit(administradore $item){
        return view('painel-admin.administradores.edit', ['item' => $item]);   
     }
 
 
     public function editar(Request $request, administradore $item){
         
        $item->nome = $request->nome;
        $item->matricula = $request->matricula;
        $item->funcao = 'administrador';
        $item->nivel = 'admin';
        $item->situacao = $request->situacao;
        $item->email = $request->email;
       

        $oldmatricula = $request->oldmatricula;
        $oldemail = $request->oldemail;

        if($oldmatricula != $request->matricula){
            $itens = administradore::where('matricula', '=', $request->matricula)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Matricula já Cadastrada!')</script>";
                return view('painel-admin.administradores.edit', ['item' => $item]);   
                
            }
        }

        if($oldemail != $request->email){
            $itens = administradore::where('email', '=', $request->email)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Email já Cadastrado!') </script>";
                return view('painel-admin.administradores.edit', ['item' => $item]);   
                
            }
        }
       

        $item->save();
         return redirect()->route('administradores.index');
 
     }

     public function delete(administradore $item){
        $item->delete();
        return redirect()->route('administradores.index');
     }

     public function modal($id){
        $item = administradore::orderby('id', 'desc')->paginate();
        return view('painel-admin.administradores.index', ['itens' => $item, 'id' => $id]);

     }
}
