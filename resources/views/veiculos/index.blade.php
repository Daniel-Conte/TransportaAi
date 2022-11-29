@extends('layouts.default')

@section('title', 'Listagem de veículos')

@section('content_header')
    <h1>Veículos</h1>
@stop

@section('content')
    {!! Form::open(["name" => "form_name", "route" => "veiculos"]) !!}
        <div class="sidebar-form">
            <div class="input-group">
                <input type="text" name="placa_filtro" class="form-control" style="width: 80% !important;" placeholder="Pesquisa...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
    {!! Form::close() !!}
    <br>

    <table class="table table-stripe table-bordered table-hover">
        <thead>
            <th>Placa</th>
            <th>Capacidade de carga</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($veiculos as $veiculo)
                <tr>
                    <td class="placa text-uppercase">{{ $veiculo->placa }}</td>
                    <td>{{ $veiculo->capacidade_carga }} Kg</td>
                    <td>
                        <a href="{{ route("veiculos.edit", ["id"=> \Crypt::encrypt($veiculo->id)]) }}" class="btn-sm btn-success">Editar</a>
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

 @section("js")
    <script>
        $(document).ready(function() {
            $(".placa").mask("AAA-9A99");
        })
    </script>
@stop