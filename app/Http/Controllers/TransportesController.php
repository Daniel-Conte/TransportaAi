<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transporte;
use App\Http\Requests\TransporteRequest;
use App\Produto;
use App\TransporteProduto;
use App\Veiculo;

class TransportesController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('veiculo_filtro');
        if($filtragem == null)
            $transportes = Transporte::orderBy('id', "DESC")->paginate(5);
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
            $veiculo = Veiculo::find($request->veiculo_id);
            $produtos = array_unique($produtos);

            $peso_total = 0;

            for($i = 0; $i < count($produtos); $i++) {
                $produto = Produto::find($request->produtos[$i]);

                $peso_total = $peso_total + (floatval($produto->peso) * intval($request->quantidade[$i]));
            }

            if($veiculo->capacidade_carga < $peso_total) {
                return redirect()->back()->withInput()->with("message", "Peso total dos produtos não pode ser maior que a capacidade de carga do veículo");
            }

            $transporte = Transporte::create([
                "remetente_id"=> $request->get("remetente_id"),
                "destinatario_id"=> $request->get("destinatario_id"),
                "transportadora_id"=> $request->get("transportadora_id"),
                "veiculo_id"=> $request->get("veiculo_id"),
            ]);

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
}
