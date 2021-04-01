<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\validaForm;
use App\Models\Despesas;
use App\Models\Usuario;

class DespesasController extends Controller
{
    
    public function nova(validaForm $request)
    {

        $valor = str_replace('.', '', $request->valor);
        $valor = str_replace(',', '.', $valor);

        if (is_numeric($valor)) {
  
            $despesa = new Despesas;

            $despesa->descricao = $request->descricao;
            $despesa->data = $request->data;
            $despesa->anexo = 'Sem Anexo';
            $despesa->id_usuario = Auth::user()->id;
            $despesa->valor = $valor;
            $despesa->save();

            if ($request->image) {

                $pasta = $despesa->id; //Pasta com ID
                $nomeoriginal = $request->file('image')->getClientOriginalName(); //Pega nome do arquivo
                $upload = $request->file('image')->storeAs("public/" . $pasta, $nomeoriginal);

                $anexo = "storage/$pasta/$nomeoriginal";

                $despesa = Despesas::where('id', $despesa->id)
                ->where('id_usuario', Auth::user()->id)
                ->update(['anexo' => $anexo]);

            } 

            return redirect()->route('DespesasX - Inicio')->with('sucesso','Despesa Adicionada com sucesso! ;)');

        } else {

            return redirect()
                ->back();
        }
    }


    public function editaDespesaIndex(Request $request)
    {

        $id = request('id');
        $edit = Despesas::where('id', $id)->where('id_usuario', Auth::user()->id)->get();


        if (count($edit) == 1) {

            return view('SistemaDespesas.edita', compact('edit', 'id'));
        } else {

            return redirect()->Route('DespesasX - Inicio')->with('erro','Despesa Inválida');
        }

    }


    public function edita(validaForm $request)
    {

        $id = request('id');

        $valor = str_replace('.', '', $request->valor);
        $valor = str_replace(',', '.', $valor);

        if (is_numeric($valor)) {

            if ($request->image) {

                $pasta = $id; //Pasta com ID
                $nomeoriginal = $request->file('image')->getClientOriginalName(); //Pega nome do arquivo
                $upload = $request->file('image')->storeAs("public/" . $pasta, $nomeoriginal);

                $anexo = "storage/$pasta/$nomeoriginal";

            } else {

                $pegarAnexoQuery = Despesas::where('id', $id)->where('id_usuario', Auth::user()->id)->get();

            foreach ($pegarAnexoQuery as $pegaAnexo) {
              
                $anexo = $pegaAnexo->anexo;

            }
        }

                $despesa = Despesas::where('id', $id)
                  ->where('id_usuario', Auth::user()->id)
                  ->update([
                    'descricao' => $request->descricao,
                    'data' => $request->data,
                    'anexo' => $anexo,
                    'valor' => $valor
                  ]);


            return redirect()->route('DespesasX - Inicio')->with('sucesso','Despesa Editada com sucesso! ;)');

        } else {
            
            return redirect()
                ->back();
        }
    }


    public function delete(Request $request)
    {

         $id = request('id');

        $pegarAnexoQuery = Despesas::where('id', $id)->where('id_usuario', Auth::user()->id)->get();

        foreach ($pegarAnexoQuery as $pegaAnexo) {
             if ($pegaAnexo->anexo != ('Sem Anexo')) {

                unlink($pegaAnexo->anexo);
            }
        }

        $despesa = Despesas::where('id', $id)->where('id_usuario', Auth::user()->id)->delete();


        if ($despesa) {

            return redirect()->route('DespesasX - Inicio')->with('sucesso','Despesa deletada com sucesso! ;)');

        } else {

            return redirect()->route('DespesasX - Inicio')->with('erro','Despesa Inválida');
        }
    }


    public function verDespesas()
    {
        $despesas = Usuario::find(Auth::user()->id)->UsuarioDespesas()->paginate(5);
        return view('SistemaDespesas.Inicio', compact('despesas'));
    }


    public function verDespesasTotalAnteriores(Request $request)
    {

        $mes = request('data');
        $valordespesa = Despesas::Where('data', 'like', '%' . date($mes . '/Y')) 
        ->where('id_usuario', Auth::user()->id)
        ->sum('valor');

     
        return view('SistemaDespesas.Anterior', compact('valordespesa'));
    }


    function AjaxDespesas(Request $request)
    {
        if ($request->ajax()) {

            $despesas = Usuario::find(Auth::user()->id)->UsuarioDespesas()->paginate(5);
            return view('SistemaDespesas.tabela', compact('despesas'));
        }
    }

}
