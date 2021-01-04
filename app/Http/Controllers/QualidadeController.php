<?php

namespace App\Http\Controllers;

use App\Models\qualidade;
use Illuminate\Http\Request;

class QualidadeController extends Controller
{
    public function index(){
        $tabela = qualidade::orderby('id', 'desc')->paginate();
        return view('painel-admin.qualidades.index', ['itens' => $tabela]);
    }

    public function create(){
        return view('painel-admin.qualidades.create');
    }


    public function insert(Request $request){
        $tabela = new qualidade();
       
        $tabela->referencia = $request->referencia;
        $tabela->oc = $request->oc;
        $tabela->cor = $request->cor;
        $tabela->op = $request->op;
        $tabela->quantidade = $request->quantidade;
        $tabela->tempo = $request->tempo;
        $tabela->minutos = $request->minutos;
        $tabela->data_cadastro = $request->data;
                
        $itens = qualidade::where('oc', '=', $request->oc)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('OC já Cadastrado!') </script>";
            return view('painel-admin.qualidades.create');
            
        }

      

        $tabela->save();
       
        return redirect()->route('qualidades.index');

    }


    public function edit(qualidade $item){
        return view('painel-admin.qualidades.edit', ['item' => $item]);   
     }
 
 
     public function editar(Request $request, qualidade $item){
         
       
        $item->referencia = $request->referencia;
        $item->oc = $request->oc;
        $item->cor = $request->cor;
        $item->op = $request->op;
        $item->quantidade = $request->quantidade;
        $item->tempo = $request->tempo;
        $item->minutos = $request->minutos;
        $item->data_cadastro = $request->data; 
        $old = $request->old;
       
       
        if($old != $request->oc){
            $itens = qualidade::where('oc', '=', $request->oc)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('OC já Cadastrado!') </script>";
                return view('painel-admin.qualidades.edit', ['item' => $item]);   
                
            }
        }
       

        $item->save();
         return redirect()->route('qualidades.index');
 
     }


     public function delete(qualidade $item){
        $item->delete();
        return redirect()->route('qualidades.index');
     }

     public function modal($id){
        $item = qualidade::orderby('id', 'desc')->paginate();
        return view('painel-admin.qualidades.index', ['itens' => $item, 'id' => $id]);

     }
}
