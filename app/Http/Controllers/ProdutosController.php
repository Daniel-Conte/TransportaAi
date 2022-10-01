<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller {
    
    public function index() {
        $produtos = Produto::orderBy("descricao")->paginate(5);
        return view('produtos.index', ['produtos' => $produtos]);
    }

    public function create() {
        return view("produtos.create");
    }

    public function store(ProdutoRequest $request) {
        $novo_ator = $request->all();
        Produto::create($novo_ator);

        return redirect()->route("produtos");
    }

    public function destroy($id) {
        Produto::find($id)->delete();
        return redirect()->route('produtos');
    }
    
    public function edit($id) {
        $ator = Produto::find($id);
        return view('produtos.edit', compact('ator'));
    }

    public function update(ProdutoRequest $request, $id) {
        Produto::find($id)->update($request->all());
        return redirect()->route('produtos');
    }
}
