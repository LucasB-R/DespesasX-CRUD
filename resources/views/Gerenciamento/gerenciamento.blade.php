'@extends('Gerenciamento.Layout.cabecalho')


@section('ConteudoAdmin')

	<div class="tabelaContainer">
@if(count($pendentes) >=1 )

  <ul class="responsive-table">
    <li class="table-header">
      <div class="coluna coluna-1">E-Mail</div>
      <div class="coluna coluna-3">Aceitar</div>
         <div class="coluna coluna-4">Deletar</div>
    </li>

@foreach ($pendentes as $retorno)

   <li class="table-row">
      <div class="coluna coluna-1" data-label="E-Mail">{{$retorno->email}}</div>
    
   <div class="coluna coluna-3" data-label="Aceitar">  <a href="{{Route('DespesasX - Aceitar', ['id' => $retorno->id])}}"><button class="btn btn-success" >Liberar Acesso</button></a> </div>

    <div class="coluna coluna-4" data-label="Deletar"> <a href="{{Route('DespesasX - Deletar', ['id' => $retorno->id])}}">
 	<button class="btn btn-danger" >Deletar Registro</button></a>


@endforeach
</li></div>
</ul>


@else

  <ul class="responsive-Tablenone">
    <li class="table-nonehead">
      <div class="coluna coluna-2">Sem solicitações</div>
  </li>
</ul>
</div>
@endif
@endsection
'