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
<form class="meuForm" action="{{Route('DespesasX - Editando', ['id' => $id])}}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	@foreach($edit as $dadosAtuais)

@include('SistemaDespesas.form')

@endforeach
              <div class="grupoForm">
                <button type="submit">Editar</button>
            </div>
            
                 <div class="grupoForm">
         
            <a href="{{Route('DespesasX - Inicio')}}">Cancelar e voltar ao inicio</a>
                 
            </div>
</form>





@endsection