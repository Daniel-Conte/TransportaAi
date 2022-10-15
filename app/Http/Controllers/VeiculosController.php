<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoRequest;
use App\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class VeiculosController extends Controller {
    public function index(Request $filtro) {
        $filtragem = $filtro->get('placa_filtro');

        if($filtragem == null) {
            $veiculos = Veiculo::orderBy("placa")->paginate(5);
        } else {
            $veiculos = Veiculo::where("placa", "like", "%".$filtragem."%")
                ->orderBy("placa")
                ->paginate(5)
                ->setpath("veiculos?placa_filtro=".$filtragem);
        }
        return view('veiculos.index', ['veiculos' => $veiculos]);
    }

    public function create() {
        return view("veiculos.create");
    }

    public function store(VeiculoRequest $request) {
        $novo_veiculo = $request->all();
        Veiculo::create($novo_veiculo);

        return redirect()->route("veiculos");
    }

    public function destroy($id) {
        try {
            Veiculo::find($id)->delete();
            $ret = array("status" => 200, "msg" => "null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array("status" => 500, "msg" => $e->getMessage());
        }catch (\PDOException $e) {
            $ret = array("status" => 500, "msg" => $e->getMessage());
        }
        
        return $ret;
    }
    
    public function edit(Request $request) {
        $id = Crypt::decrypt($request->get("id"));

        $veiculo = Veiculo::find($id);
        return view('veiculos.edit', compact('veiculo'));
    }

    public function update(VeiculoRequest $request) {
        $id = Crypt::decrypt($request->get("id"));

        Veiculo::find($id)->update($request->all());
        return redirect()->route('veiculos');
    }
}
