@extends('SistemaDespesas.Layout.cabecalho')


@section('Conteudo')

			
	<div class="tabelaContainer">

			@if (session('erro'))
    <div class="alert alert-danger" id="alert">
        {{ session('erro') }}
    </div>
@endif

	@if (session('sucesso'))
    <div class="alert alert-success" id="alert">
        {{ session('sucesso') }}
    </div>
@endif


<h2>Suas Despesas:</h2>



@if (count($despesas) < 1)


  <ul class="responsive-Tablenone">
    <li class="table-nonehead">
      <div class="coluna coluna-2">Seus Registros de despesas vâo ficar aqui :)</div>
  </li>
</ul>
@else
<div id="dados">
@include('SistemaDespesas.tabela')
</div>
@endif



@endsection



