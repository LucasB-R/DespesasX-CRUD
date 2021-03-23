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

@if (session('erro'))
    <div id="alert2" class="alert alert-danger">
        {{ session('erro') }}
    </div>
@endif

	@if (session('sucesso'))
    <div id="alert2" class="alert alert-success">
        {{ session('sucesso') }}
    </div>
@endif

<div class="title-bar">
  DespesasX
</div>
	<form method="POST" action="/login">
		
@csrf

 <input type="email" class="meuInput" name="email" placeholder="E-Mail" ><br><br>
 <input type="password" class="meuInput" name="senha" placeholder="Senha"><br><br>
  <input type="checkbox" name="remember"> <span>Lembrar de mim</span>
 <input type="submit" value="Login" name="submit" class="submit" ><br><br>
 <a href="{{Route('DespesasX - Cadastro')}}"> Solicite seu Cadastro </a>


	</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/menuealert.js') }}"></script>
</body>
</html>


