<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\validaForm;
use App\Models\Despesas;

class DespesasController extends Controller
{
    public function nova(validaForm $request)
    {

        $valor = str_replace('.', '', $request->valor);
        $valor = str_replace(',', '.', $valor);

        if (is_numeric($valor)) {


            if ($request->image) {
                $pastaAleatoria = Auth::user()->email . rand(50000, 45405045050454); //Pasta Aleatoria para salvamento
                $nomeoriginal = $request->file('image')->getClientOriginalName(); //Pega nome do arquivo
                $upload = $request->file('image')->storeAs("public/" . $pastaAleatoria, $nomeoriginal);


                $anexo = "storage/$pastaAleatoria/$nomeoriginal";
            } else {
                $anexo = 'Sem Anexo';
            }

            $despesa = new Despesas;

            $despesa->descricao = $request->descricao;
            $despesa->data = $request->data;
            $despesa->anexo = $anexo;
            $despesa->id_usuario = Auth::user()->id;
            $despesa->valor = $valor;
            $despesa->save();


            return redirect()->route('DespesasX - Inicio')->with('sucesso','Despesa Adicionada com sucesso! ;)');

        } else {

            return redirect()
                ->back();
        }
    }

    public function editaDespesaIndex(Request $request)
    {

        $id = request('id');
        $edit = DB::select(
            'select * from despesas where id = :id and id_usuario = :usuario',
            [
                ':id' => $id,
                ':usuario' => Auth::user()->id
            ]
        );


        if ($edit) {

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
                $pastaAleatoria = Auth::user()->email . rand(50000, 45405045050454); //Pasta Aleatoria para salvamento
                $nomeoriginal = $request->file('image')->getClientOriginalName(); //Pega nome do arquivo
                $upload = $request->file('image')->storeAs("public/" . $pastaAleatoria, $nomeoriginal);


                $anexo = "storage/$pastaAleatoria/$nomeoriginal";
            } else {
                $anexo = 'Sem Anexo';
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

        $pegarAnexoQuery = Despesas::where('id', $id)
            ->where('id_usuario', Auth::user()->id)
            ->get();

        foreach ($pegarAnexoQuery as $pegaAnexo) {
            if ($pegaAnexo->anexo != ('Sem Anexo')) {

                unlink($pegaAnexo->anexo);
            }
        }

        $despesa = Despesas::where('id', $id)
            ->where('id_usuario', Auth::user()->id)
            ->delete();


        if ($despesa) {

            return redirect()->route('DespesasX - Inicio')->with('sucesso','Despesa deletada com sucesso! ;)');

        } else {

            return redirect()->route('DespesasX - Inicio')->with('erro','Despesa Inválida');
        }
    }


    public function verDespesas()
    {
        
        $despesas = DB::table('despesas')
            ->join('usuarios', 'despesas.id_usuario', '=', 'usuarios.id')
            ->select(
                'despesas.descricao',
                'despesas.valor',
                'despesas.data',
                'despesas.anexo',
                'despesas.id'
            )->orderBy('despesas.id', 'desc')->Paginate(5);



        $temDespesa = DB::select('SELECT *
            FROM despesas
            WHERE id_usuario = :id', ['id' => Auth::user()->id]);

        return view('SistemaDespesas.Inicio', compact('despesas', 'temDespesa'));
    }


    public function verDespesasTotalAnteriores(Request $request)
    {

        $mes = request('data');

        $valordespesa = DB::select(
            '
        
        
            SELECT format(sum(valor),2,"de_DE") as despesa
            FROM despesas
            WHERE data LIKE :data
            AND id_usuario = :id
            ',

            [
                ':data' => '%' . date($mes . '/Y'),
                ':id' => Auth::user()->id
            ]
        );

        return view('SistemaDespesas.Anterior', compact('valordespesa'));
    }



    function AjaxDespesas(Request $request)
    {
        if ($request->ajax()) {



            $despesas = DB::table('despesas')
                ->join('usuarios', 'despesas.id_usuario', '=', 'usuarios.id')
                ->select(
                    'despesas.descricao',
                    'despesas.valor',
                    'despesas.data',
                    'despesas.anexo',
                    'despesas.id'
                )->orderBy('despesas.data', 'desc')->Paginate(5);

            return view('SistemaDespesas.tabela', compact('despesas'));
        }
    }
}
