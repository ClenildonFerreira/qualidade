<?php

namespace App\Http\Controllers;

use App\Models\administradore;
use Illuminate\Http\Request;

class CadAdministradorController extends Controller
{
    public function index(){
        $tabela = administradore::orderby('id', 'desc')->paginate();
        return view('painel-admin.administradores.index', ['itens' => $tabela]);
    }
}
