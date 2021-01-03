@extends('template.painel-admin')
@section('title', 'Inserir Administradores')
@section('content')
<h6 class="mb-4"><i>CADASTRO DE ADMINISTRADORES</i></h6><hr>
<form method="POST" action="{{route('administradores.insert')}}">
        @csrf

    <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" id="" name="nome" maxlength="100" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Matrícula</label>
                    <input type="matricula" class="form-control" id="matricula" name="matricula" maxlength="9" required>
                </div>
            </div>
    </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" maxlength="100">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Situação</label>
                    <select class="form-control" name="situacao" id="situacao" text-center required>
	  					<option value="ativo">Ativo</option>
	  					<option value="Inativo">Inativo</option>
				    </select>
                </div>
            </div>
        </div>
    


    
        <p align="right">
        <button type="submit" class="btn btn-primary">Salvar</button>
        </p>
    </form>
@endsection