<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\usuario;

class GerenciaUserController extends Controller
{
    public function verSolicitacao(){
        $pendentes = usuario::where('is_active', 0)
                   ->orderBy('id')
                   ->get();

     return view('Gerenciamento.gerenciamento', compact('pendentes'));
    }


    public function verAtivos(){

        $ativos = usuario::where(['is_active' => 1, 'is_admin' => 0])
        ->orderBy('id')
        ->get();
        
        
        
          return view('Gerenciamento.ativos', compact('ativos'));
        }


        public function aceitar(Request $request){

 // SE NÃO FOR ADMIN RETORNAMOS ERRO 404 //

            if (!Auth::user()->is_active || !Auth::user()->is_admin) {

            return abort(404);

            }else{
            
            $id = request('id');
            usuario::where('id', $id)->update(['is_active' => 1]);
            
            
                return redirect()->Route('DespesasX - Usuarios Gerenciamento');
            }
            }



            public function bloquear(Request $request){

 // SE NÃO FOR ADMIN RETORNAMOS ERRO 404 //

                if (!Auth::user()->is_active || !Auth::user()->is_admin) {
                
                return abort(404);

                }else{
                
                $id = request('id');
                usuario::where('id', $id)->update(['is_blocked' => 1]);

                
                
                return redirect()->Route('DespesasX - Usuarios Ativos');
                }

            }


            public function desbloquear(Request $request){

    // SE NÃO FOR ADMIN RETORNAMOS ERRO 404 //

                if (!Auth::user()->is_active || !Auth::user()->is_admin) {
                
                return abort(404);

            }else{
                
                $id = request('id');

                usuario::where('id', $id)->update(['is_blocked' => 0]);
                
                return redirect()->Route('DespesasX - Usuarios Ativos');
                }
            }




            public function deletar(Request $request){

     // SE NÃO FOR ADMIN RETORNAMOS ERRO 404 //

                if (!Auth::user()->is_active || !Auth::user()->is_admin) {
                
                return abort(404);
                }else{
                
                $id = request('id');

                usuario::where('id', $id)->delete();
               
                return redirect()->Route('DespesasX - Usuarios Gerenciamento');
                }
                
                }
}
