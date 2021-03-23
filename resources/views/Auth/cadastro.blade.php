<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{Route::getCurrentRoute()->getName()}}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">

</head>
<body>
	



<div class="wrap">

@if($errors->any())
<div class="alert alert-danger" id="alert2">
@foreach($errors->all() as $error)
{{$error}}<br>
@endforeach
</div>
@endif

	@if (session('sucesso'))
    <div id="alert2" class="alert alert-success">
  
        {{ session('sucesso') }}
    </div>
@endif
<div class="title-bar">
  DespesasX   Cadastro
</div>


<form method="POST" action="/cadastro">
		
@csrf

 <input type="email" class="meuInput" name="email" placeholder="E-Mail">
 <input type="text" class="meuInput" name="nome"  placeholder="Nome">
 <input type="text" class="meuInput" id="tel" name="telefone" placeholder="Telefone">
 <input type="password" class="meuInput" name="senha" placeholder="Senha"> 
 <input type="submit" value="Solicitar Cadastro" name="submit" class="submit" ><br><br>
 <a href="{{Route('DespesasX - Login')}}"> Já tenho conta </a>

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="{{ asset('assets/js/menuealert.js') }}"></script>
<script src="{{ asset('assets/js/mascaras.js') }}"></script>
</body>
</html>