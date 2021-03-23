@extends('SistemaDespesas.Layout.cabecalho')


@section('Conteudo')
<div class="totalContainer">

            	@if (@$valordespesa)
            	@foreach ($valordespesa as $despesaMesEscolhido)
            	
            	@if ($despesaMesEscolhido->despesa)
            	
            	          <h2>Total: R$ {{$despesaMesEscolhido->despesa}} </h2>
            	@else
            	            	<h2>Total: R$ 0,00</h2>
            	@endif
    



            	@endforeach


            	@endif
</div>
<form class="meuForm" action="{{Route('DespesasX - Despesas anteriores')}}" method="post">
	@csrf



     <div class="conteudo">
            <div class="TituloForm">
                <h1>Montante Total</h1>
            </div>

             <div class="grupoForm">
                <label>
                    <span>Deseja ver o total de despesas de qual mês do ano?</span>
                   
                   @include('SistemaDespesas.datas')
			
			             <div class="grupoForm">
                <button type="submit">Prosseguir</button>
            </div>
				
                </label>
            </div>
        </div>
    </form>





@endsection
