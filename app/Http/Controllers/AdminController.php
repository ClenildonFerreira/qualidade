<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('painel-admin.index');
    }

    public function editar(Request $request, usuario $usuario){
        
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->save();
        return redirect()->route('admin.index');

    }
}
