<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoRequest;
use App\Veiculo;
use Illuminate\Http\Request;

class VeiculosController extends Controller {
    public function index() {
        $veiculos = Veiculo::orderBy("placa")->paginate(5);
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
        Veiculo::find($id)->delete();
        return redirect()->route('veiculos');
    }
    
    public function edit($id) {
        $veiculo = Veiculo::find($id);
        return view('veiculos.edit', compact('veiculo'));
    }

    public function update(VeiculoRequest $request, $id) {
        Veiculo::find($id)->update($request->all());
        return redirect()->route('veiculos');
    }
}
