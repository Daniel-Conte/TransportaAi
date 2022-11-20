<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transporte;
use App\Http\Requests\TransporteRequest;
use App\Produto;
use App\TransporteProduto;
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
        $produtos = $request->produtos;
        $envolvidos = array($request->get("remetente_id"), $request->get("destinatario_id"), $request->get("transportadora_id"));

        if(count(array_unique($envolvidos)) < 3) {
            return redirect()->back()->withInput()->with("message", "Remetente, destinatário e transportadora devem ser diferentes");
        }

        if(!empty($produtos)) {
            $transporte = Transporte::create([
                "remetente_id"=> $request->get("remetente_id"),
                "destinatario_id"=> $request->get("destinatario_id"),
                "transportadora_id"=> $request->get("transportadora_id"),
                "veiculo_id"=> $request->get("veiculo_id"),
            ]);

            $produtos = array_unique($produtos);

            for($i = 0; $i < count($produtos); $i++) {
                $produto = Produto::find($request->produtos[$i]);

                TransporteProduto::create([
                    "transporte_id" => $transporte->id,
                    "produto_id" => $produtos[$i],
                    "quantidade" => $request->quantidade[$i],
                    "peso_total" => floatval($produto->peso) * intval($request->quantidade[$i])
                ]);
            }
        } else {
            return redirect()->back()->withInput()->with("message", "Não é possível salvar um transporte sem adicionar, pelo menos, UM produto!");
        }

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
