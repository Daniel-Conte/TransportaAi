<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Envolvido;
use App\Http\Requests\EnvolvidoRequest;
use Illuminate\Support\Facades\Crypt;

class EnvolvidosController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('razao_social_filtro');
        if($filtragem == null)
            $envolvidos = Envolvido::orderBy('razao_social')->paginate(5);
        else
            $envolvidos = Envolvido::where('razao_social', 'like', '%'.$filtragem.'%')
                ->orderBy("razao_social")
                ->paginate(5)
                ->setpath('envolvidos?razao_social_filtro='.$filtragem);

        return view ('envolvidos.index', ['envolvidos' => $envolvidos]);
    }

    public function create(){
        return view('envolvidos.create');
    }

    public function store(EnvolvidoRequest $request){
        $novo_envolvido = $request->all();
        Envolvido::create($novo_envolvido);

        return redirect()->route('envolvidos');
    }

    public function destroy($id){
        try{
            Envolvido::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>"null");
        } catch(\Illuminate\Database\QueryException $e){
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch(PDOException $e){
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }       
        return $ret;
    }

    public function edit(Request $request) {
        $id = Crypt::decrypt($request->get("id"));

        $envolvido = Envolvido::find($id);
        return view('envolvidos.edit', compact('envolvido'));
    }

    public function update(EnvolvidoRequest $request) {
        $id = Crypt::decrypt($request->get("id"));

        Envolvido::find($id)->update($request->all());
        return redirect()->route('envolvidos');
    }
}
