@extends('template.painel-admin')
@section('title', 'Inserir Produção Diária')
@section('content')
<h6 class="mb-4"><i>CADASTRO DA PRODUÇÃO DIÁRIA</i></h6><hr>
<form method="POST" action="{{route('qualidades.insert')}}">
        @csrf

        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Referência</label>
                    <input type="text" class="form-control" id="" name="referencia" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Meta</label>
                    <select class="form-control" name="meta" id="meta">
                    
                    <?php
                        use App\Models\Meta;
                        $tabela = Meta::all();
                    ?>
                    
                    @foreach($tabela as $item)
                    <option value='{{$item->turno_1}}' >{{$item->turno_1}}</option>
                    <option value='{{$item->turno_2}}' >{{$item->turno_2}}</option>
                    @endforeach 
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">OC</label>
                    <input type="text" class="form-control" id="" name="oc" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Usuario</label>
                    <select class="form-control" name="revisora">
                    <?php
                        use App\Models\usuario;
                        @session_start(); 
                        $id_usuario = @$_SESSION['id_usuario'];
                        $usuario = usuario::find($id_usuario);
                    ?>
                    <option value='{{$item->id}}' >{{$usuario->nome}}</option> 
                    </select>
                </div>
            </div>

           
            
        </div>

        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Cor</label>
                    <input type="text" class="form-control" id="" name="cor" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">OP</label>
                    <input type="text" class="form-control" id="" name="op" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantidade</label>
                    <input type="text" class="form-control" id="" name="quantidade" required>
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Data Criação</label>
                    <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="data" name="data">
                </div>
            </div>
        </div>


       

        <p align="right">
        <button type="submit" class="btn btn-primary">Salvar</button>
        </p>
    </form>
@endsection