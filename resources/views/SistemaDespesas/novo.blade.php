@extends('SistemaDespesas.Layout.cabecalho')


@section('Conteudo')
<div class="tabelaContainer">


@if($errors->any())
<div class="alert alert-danger" id="alert">
@foreach($errors->all() as $error)
{{$error}}<br>
@endforeach
</div>
@endif

   
</div>
<form class="meuForm" action="{{Route('DespesasX - Nova Despesa')}}" method="post" enctype="multipart/form-data">
	@csrf
@include('SistemaDespesas.form')


                <div class="grupoForm">
                <button type="submit">Criar</button>
            </div>

                 <div class="grupoForm">
         
            <a href="{{Route('DespesasX - Inicio')}}">Cancelar e voltar ao inicio</a>
            	 
            </div>
</form>





@endsection