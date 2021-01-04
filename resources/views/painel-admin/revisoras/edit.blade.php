@extends('template.painel-admin')
@section('title', 'Editar Revisoras')
@section('content')
<h6 class="mb-4"><i>EDIÇÃO DE REVISORAS</i></h6><hr>
<form method="POST" action="{{route('revisoras.editar', $item)}}">
        @csrf
        @method('put')
    <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input value="{{$item->nome}}" type="text" class="form-control" id="" name="nome" maxlength="100" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Matrícula</label>
                    <input value="{{$item->matricula}}" type="matricula" class="form-control" id="matricula" name="matricula" maxlength="9" required>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input value="{{$item->email}}" type="email" class="form-control" id="email" name="email" maxlength="100">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Função</label>
                <select value="{{$item->funcao}}" class="form-control" name="funcao" id="funcao" text-center required>
                    <option value="revisora">Revisora</option>
	  				<option value="inspetora">Inspetora</option>
				</select>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Situação</label>
                <select value="{{$item->situação}}" class="form-control" name="situacao" id="situacao" text-center required>
	  				<option value="ativo">Ativo</option>
	  				<option value="Inativo">Inativo</option>
				</select>
            </div>
        </div>
    </div>

    
        <p align="right">
        <input value="{{$item->matricula}}" type="hidden"  name="oldmatricula">
        <input value="{{$item->email}}" type="hidden"  name="oldemail">
        <button type="submit" class="btn btn-primary">Salvar</button>
        </p>
    </form>
@endsection