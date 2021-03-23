@extends('Gerenciamento.Layout.cabecalho')


@section('ConteudoAdmin')

	<div class="tabelaContainer">
@if(count($ativos) >=1 )

  <ul class="responsive-table">
    <li class="table-header">
      <div class="coluna coluna-1">E-Mail</div>
       <div class="coluna coluna-2"></div>
      <div class="coluna coluna-3">Bloquear</div>
    </li>

@foreach ($ativos as $retorno)

   <li class="table-row">
      <div class="coluna coluna-1" data-label="E-Mail">{{$retorno->email}}</div>
    
   <div class="coluna coluna-3">

{!! $retorno->is_blocked == 1 ? 
	"<a href='".Route('DespesasX - unBlock', ['id' => $retorno->id])."'><button class='btn btn-success'>Desbloquear</button></a>" : 
	"<a href='".Route('DespesasX - Block', ['id' => $retorno->id])."'><button class='btn btn-danger'>Bloquear</button></a>" 
!!} 

   </button></a> </div>

    

@endforeach


</ul>


@else

  <ul class="responsive-Tablenone">
    <li class="table-nonehead">
      <div class="coluna coluna-2">Sem ativos</div>
  </li>
</ul>
</div>
@endif
@endsection
