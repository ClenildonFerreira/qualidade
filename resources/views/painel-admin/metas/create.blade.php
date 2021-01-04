@extends('template.painel-admin')
@section('title', 'Inserir Metas')
@section('content')
<h6 class="mb-4"><i>CADASTRO DE METAS</i></h6><hr>
<form method="POST" action="{{route('metas.insert')}}">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Turno 1 em %</label>
                    <input type="text" class="form-control" id="" name="turno_1" maxlength="4" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Turno 2 em %</label>
                    <input type="text" class="form-control" id="" name="turno_2" maxlength="4" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Turno 3 em %</label>
                    <input type="text" class="form-control" id="" name="turno_3" maxlength="4" required>
                </div>
            </div>
        </div>    
        <p align="right">
            <button type="submit" class="btn btn-primary mt-4 mb-5">Salvar</button>
        <p>  
    </form>
    
@endsection