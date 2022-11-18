<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transporte;
use App\Http\Requests\TransporteRequest;
use Illuminate\Support\Facades\Crypt;

class TransportesController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('veiculo_filtro');
        if($filtragem == null)
            $transportes = Transporte::orderBy('id')->paginate(5);
        else
            $transportes = Transporte::where('veiculo_id', 'like', '%'.$filtragem.'%')
                ->orderBy("veiculo_id")
                ->paginate(5)
                ->setpath('transportes?veiculo_filtro='.$filtragem);

        return view ('transportes.index', ['transportes' => $transportes]);
    }

    public function create(){
        return view('transportes.create');
    }

    public function store(TransporteRequest $request){
        $novo_transporte = $request->all();
        Transporte::create($novo_transporte);

        return redirect()->route('transportes');
    }

    public function destroy($id){
        try{
            Transporte::find($id)->delete();
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

        $transporte = Transporte::find($id);
        return view('transportes.edit', compact('transporte'));
    }

    public function update(TransporteRequest $request) {
        $id = Crypt::decrypt($request->get("id"));

        Transporte::find($id)->update($request->all());
        return redirect()->route('transportes');
    }
}
