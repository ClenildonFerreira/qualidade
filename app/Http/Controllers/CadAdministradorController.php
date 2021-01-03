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
        $tabela->funcao = $request->função;
        $tabela->nivel = $request->nivel;
        $tabela->situacao = $request->situacao;
        $tabela->email = $request->email;

        $tabela2 = new usuario();
        $tabela2->nome = $request->nome;
        $tabela2->matricula = $request->matricula;
        $tabela2->funcao = $request->função;
        $tabela2->senha = '123';
        $tabela2->nivel = 'instrutor';

        $itens = administradore::where('cpf', '=', $request->cpf)->orwhere('credencial', '=', $request->credencial)->orwhere('email', '=', $request->email)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.instrutores.create');
            
            
        }

        $tabela->save();
        $tabela2->save();
        return redirect()->route('instrutores.index');

    }
}
