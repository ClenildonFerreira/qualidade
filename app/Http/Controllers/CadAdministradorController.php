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
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.administradores.create');
            
            
        }

        $tabela->save();
        $tabela2->save();
        return redirect()->route('administradores.index');

    }
}
