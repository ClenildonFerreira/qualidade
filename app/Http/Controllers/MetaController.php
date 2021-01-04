<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    public function index(){
        $tabela = Meta::orderby('id', 'desc')->paginate();
        return view('painel-admin.metas.index', ['itens' => $tabela]);
    }

    public function create(){
        return view('painel-admin.metas.create');
    }


    public function insert(Request $request){
        $tabela = new Meta();
        $tabela->turno_1 = $request->turno_1;
        $tabela->turno_2 = $request->turno_2;
        $tabela->turno_3 = $request->turno_3;
                
        $itens = Meta::where('turno_1', '=', $request->turno_1)->orwhere('turno_2', '=', $request->turno_2)->orwhere('turno_3', '=', $request->turno_3)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Meta já Cadastrada!')</script>";
            return view('painel-admin.metas.create');
            
        }

        $tabela->save();
       
        return redirect()->route('metas.index');

    }


    public function edit(Meta $item){
        return view('painel-admin.metas.edit', ['item' => $item]);   
     }
 
 
     public function editar(Request $request, Meta $item){
         
        $item->turno_1 = $request->turno_1;
        $item->turno_2 = $request->turno_2;
        $item->turno_3 = $request->turno_3;
               

        $item->save();
         return redirect()->route('metas.index');
 
    }


     public function delete(Meta $item){
        $item->delete();
        return redirect()->route('metas.index');
     }

     public function modal($id){
        $item = Meta::orderby('id', 'desc')->paginate();
        return view('painel-admin.metas.index', ['itens' => $item, 'id' => $id]);

     }
}
