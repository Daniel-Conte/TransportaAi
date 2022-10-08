@extends('layouts.default')

@section('title', 'Listagem de cidades')

@section('content_header')
    <h1>Cidades</h1>
@stop

@section('content')
    <table class="table table-stripe table-bordered table-hover">
        <thead>
            <th>Nome</th>
            <th>UF</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($cidades as $cidade)
                <tr>
                    <td>{{ $cidade->nome }}</td>
                    <td>{{ $cidade->uf }}</td>
                    <td>
                        <a href="{{ route("cidades.edit", ["id"=>$cidade->id]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{ $cidade->id }})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>

    {{ $cidades->links() }}

    <a href="{{ route("cidades.create", []) }}" class="btn btn-info">Adicionar</a>
 @stop

 @section("table-delete")
    "cidades"
 @stop()