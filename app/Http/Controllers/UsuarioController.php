<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function login(Request $request){
        
        $usuario = $request->matricula;
        $senha = $request->funcao;

        $usuarios = usuario::where('matricula', '=', $usuario)->orwhere('email', '=', $usuario)->where('funcao', '=', $senha)->first();
        
        if(@$usuarios->id != null){
            @session_start();
            $_SESSION['id_usuario'] = $usuarios->id;
            $_SESSION['nome_usuario'] = $usuarios->nome;
            $_SESSION['matricula_usuario'] = $usuarios->matricula;
            $_SESSION['funcao_usuario'] = $usuarios->funcao;
            $_SESSION['nivel_usuario'] = $usuarios->nivel;
            $_SESSION['situacao_usuario'] = $usuarios->situacao;
            $_SESSION['email_usuario'] = $usuarios->matricula;
            
            if($_SESSION['nivel_usuario'] == 'admin'){
                return view('painel-admin.index');
            }

            if($_SESSION['nivel_usuario'] == 'revisora'){
                return view('painel-revisora.index');
            }

            if($_SESSION['nivel_usuario'] == 'inspetora'){
                return view('painel-inspetora.index');
            }

            if($_SESSION['nivel_usuario'] == 'gestao'){
                return view('painel-gestao.index');
            }
                    
        }else{
            echo "<script language='javascript'> window.alert('Dados Incorretos!') </script>";
            return view('index');
        }
        
       
    }


    public function logout(){
       @session_start();
       @session_destroy();
       return view('index');
    }


    public function index(){
        $tabela = usuario::orderby('id', 'desc')->paginate();
        return view('painel-admin.usuarios.index', ['itens' => $tabela]);
    }


    public function delete(usuario $item){
        $item->delete();
        return redirect()->route('usuarios.index');
     }

     public function modal($id){
        $item = usuario::orderby('id', 'desc')->paginate();
        return view('painel-admin.usuarios.index', ['itens' => $item, 'id' => $id]);

     }
}
