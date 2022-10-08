<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;
use App\Http\Requests\CidadeRequest;

class CidadesController extends Controller
{
    public function index() {
        $cidades = Cidade::orderBy("nome")->paginate(5);
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
        Cidade::find($id)->delete();
        return redirect()->route('cidades');
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
