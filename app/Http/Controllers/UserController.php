<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\usuario;
use App\Http\Requests\ValidaRegistro;
use App\Http\Requests\ValidaLogin;


class UserController extends Controller
{
   



public function login(ValidaLogin $request){

if (Auth::attempt([
	'email' => $request->email, 
	'password' => $request->senha], 
	$request->remember)) {


if (empty(Auth::user()->is_active)){
Auth::logout();
return redirect('/login')->with('erro', 'Usuário não foi ativado ainda...');
die();

} else {

if  (!empty(Auth::user()->is_blocked)): 
Auth::logout();
return redirect('/login')->with('erro', 'Usuário Bloqueado');
die();

elseif (!empty(Auth::user()->is_active)):
 return redirect('/despesas' );
endif;

}		

}else{
	return redirect('/login')->with('erro', 'E-Mail ou Senha Incorreto(s)');
	die();	
}
}



public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
}





public function Registro(ValidaRegistro $request) {   


	$registro = new usuario;

	$registro->nome = $request->nome;
	$registro->email = $request->email;
	$registro->password =  bcrypt($request->senha);
	$registro->telefone = $request->telefone;
	$registrar = $registro->save();

if ($registrar):

	return redirect('/login')->with('sucesso', '

	Conta Criada! Aguarde até que nós a ativemos!!

	');

else:

	return redirect('/cadastro')->with('erro', '

	Conta Não Criada! Houve um erro contate o administrador!

	');

endif;

}









}
