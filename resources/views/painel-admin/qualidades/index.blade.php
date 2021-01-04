@extends('template.painel-admin')
@section('title', 'Produção Diária')
@section('content')
<?php

use App\Models\instrutore;
use App\Models\qualidade;

@session_start();
if(@$_SESSION['nivel_usuario'] != 'admin'){ 
  echo "<script language='javascript'> window.location='./' </script>";
}
if(!isset($id)){
  $id = ""; 
  
}

?>


<a href="{{route('qualidades.inserir')}}" type="button" class="mt-4 mb-4 btn btn-primary">Inserir Formulario de Produção Diária</a>

<!-- DataTales Example -->
<div class="card shadow mb-4">

<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Referência</th>
          <th>OC</th>
          <th>Cor</th>
          <th>OP</th>
          <th>Quantidade</th>
          <th>Tempo</th>
          <th>Minutos</th>
          <th>Data Cadastro</th>
             
          <th>Ações</th>
        </tr>
      </thead>

      <tbody>
      @foreach($itens as $item)
      <?php 
       $data = implode('/', array_reverse(explode('-', $item->data_revisao)));
       $instrutor = qualidade::where('id', '=', $item->instrutor)->first();
       if($item->instrutor != '0'){
        $instrutor = $instrutor->nome;
       }else{
        $instrutor = 'Nenhum inspertora';
       }
       
        
       ?>
         <tr>
            <td>{{$item->referencia}}</td>
            <td>{{$item->oc}}</td>
            <td>{{$item->cor}}</td>
            <td>{{$item->op}}</td>
            <td>{{$item->quantidade}}</td>
            
            <td>{{$item->tempo}}</td>
            <td>{{$item->minutos}}</td>
            <td>{{$usuario}}</td>
            <td>{{$data_cadastro}}</td>
                      
            <td>
            <a href="{{route('qualidades.edit', $item)}}"><i class="fas fa-edit text-info mr-1"></i></a>
            <a href="{{route('qualidades.modal', $item)}}"><i class="fas fa-trash text-danger mr-1"></i></a>
            </td>
        </tr>
        @endforeach 
      </tbody>
  </table>
</div>
</div>
</div>


   


</div>

<script type="text/javascript">
  $(document).ready(function () {
    $('#dataTable').dataTable({
      "ordering": false
    })

  });
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja Realmente Excluir este Registro?
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form method="POST" action="{{route('qualidades.delete', $id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>


<?php 
if(@$id != ""){
  echo "<script>$('#exampleModal').modal('show');</script>";
}
?>

@endsection


