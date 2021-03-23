<?php 
if (!Auth::user()->is_active || !Auth::user()->is_admin) {

	Auth::logout();
    session()->invalidate();
    session()->regenerateToken();

    header("Location: /login");

  die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>{{Route::getCurrentRoute()->getName()}}</title>

		  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

       <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">

		  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
		 

		  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

		  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		  
		    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">



</head>
<body style="background-color: #ddd;">
<header>
	
	<a href="#" class="titulo">DespesasX</a>
	<div class="menu-T"></div>

<nav class="menuHead">

    <ul>




<li><a href="{{Route('DespesasX - Usuarios Gerenciamento')}}" {!!Route::currentRouteName() == "DespesasX - Usuarios Gerenciamento" ? 'class="active"' : ''!!}> Solicitações</a></li>


 	    <li><a href="{{Route('DespesasX - Usuarios Ativos')}}" {!!Route::currentRouteName() == "DespesasX - Usuarios Ativos" ? 'class="active"' : ''!!}> Ver Ativos</a></li>


    	<li><a href="{{Route('DespesasX - Inicio')}}" {!!Route::currentRouteName() == "DespesasX - Nova Despesa" ? 'class="active"' : ''!!}>Voltar</a></li>
    

    </ul>


</nav>
<div class="clearfix"></div>



</header>
	@yield('ConteudoAdmin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>

    <script src="{{ asset('assets/js/menuealert.js') }}"></script>
    <script src="{{ asset('assets/js/mascaras.js') }}"></script>
    <script src="{{ asset('assets/js/ajax.js') }}"></script>


</body>
</html>

