<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;
use App\Http\Requests\CidadeRequest;

class CidadesController extends Controller
{
        public function index(Request $filtro) {
            $filtragem = $filtro->get('nome_filtro');
    
            if($filtragem == null) {
                $cidades = Cidade::orderBy("nome")->paginate(5);
            } else {
                $cidades = Cidade::where("nome", "like", "%".$filtragem."%")
                    ->orderBy("nome")
                    ->paginate(5)
                    ->setpath("cidades?nome_filtro=".$filtragem);
            }
        return view('cidades.index', ['cidades' => $cidades]);
    }

    public function create() {
        return view("cidades.create");
    }

    public function store(CidadeRequest $request) {
        $novo_cidade = $request->all();
        Cidade::create($novo_cidade);

        return redirect()->route("cidades");
    }

    public function destroy($id) {
        try {
            Cidade::find($id)->delete();
            $ret = array("status" => 200, "msg" => "null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array("status" => 500, "msg" => $e->getMessage());
        }catch (\PDOException $e) {
            $ret = array("status" => 500, "msg" => $e->getMessage());
        }

        return $ret;
    }
    
    public function edit($id) {
        $cidade = Cidade::find($id);
        return view('cidades.edit', compact('cidade'));
    }

    public function update(CidadeRequest $request, $id) {
        Cidade::find($id)->update($request->all());
        return redirect()->route('cidades');
    }
}
