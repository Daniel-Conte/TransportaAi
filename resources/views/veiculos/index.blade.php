@extends('layouts.default')

@section('title', 'Listagem de veículos')

@section('content_header')
    <h1>Veículos</h1>
@stop

@section('content')
    <table class="table table-stripe table-bordered table-hover">
        <thead>
            <th>Placa</th>
            <th>Capacidade de carga</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($veiculos as $veiculo)
                <tr>
                    <td>{{ $veiculo->placa }}</td>
                    <td>{{ $veiculo->capacidade_carga }}</td>
                    <td>
                        <a href="{{ route("veiculos.edit", ["id"=>$veiculo->id]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{ $veiculo->id }})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>

    {{ $veiculos->links() }}

    <a href="{{ route("veiculos.create", []) }}" class="btn btn-info">Adicionar</a>
 @stop

 @section("table-delete")
    "veiculos"
 @stop()