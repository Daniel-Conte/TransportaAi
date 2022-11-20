@extends('layouts.default')
@section('title', 'Listagem de Transportes')
@section('content_header')
    <h1>Transportes</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'transportes'])!!}
    <div class="sidebar-form">
        <div class="input-group">
            <input type="text" name="veiculo_filtro" class="form-control" style="width:80% !important;" placeholder="Pesquisa...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-default"><i class="fa fa-search"></i></button>
                </span>
        </div>
    </div>
    {!! Form::close()!!}
<br>

@stop
@section('content')
    <table class="table table-stripe table-bordered table-hover">
        <thead>
            <th><i class="fa fa-fw fa-user"></i>Rementente</th>
            <th><i class="fa fa-fw fa-user"></i>Destinatario</th>
            <th><i class="fa fa-fw fa-user"></i>Transportadora</th>
            <th><i class="fa fa-fw fa-truck"></i>Veiculo</th>
            <th><i class="fa fa-fw fa-shopping-cart"></i>Produtos</th>
            <th><i class="fa fa-fw fa-weight-hanging"></i>Peso total</th>
        </thead>
        <tbody>
            @foreach($transportes as $transporte)
            <tr>
                <td>{{ $transporte->remetente->razao_social}}</td>
                <td>{{ $transporte->destinatario->razao_social}}</td>
                <td>{{ $transporte->transportadora->razao_social}}</td>
                <td>{{ $transporte->veiculo->placa}}</td>
                <td>
                    @foreach ($transporte->produtos as $p)
                        <li>{{ $p->quantidade }}x {{ $p->produto->descricao }}</li>
                    @endforeach
                </td>
                <td>
                    {{ array_reduce($transporte->produtos->toArray(), function($total, $curr) { return $total + floatVal($curr["peso_total"]); }, 0) }} Kg
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$transportes->links()}}
    
    <a href="{{ route('transportes.create', []) }}" class="btn btn-info">Adicionar</a>
@stop