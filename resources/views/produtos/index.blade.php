@extends('adminlte::page')

@section('title', 'Listagem de produtos')

@section('content_header')
    <h1>Produtos</h1>
@stop

@section('content')
    <table class="table table-stripe table-bordered table-hover">
        <thead>
            <th>Descrição</th>
            <th>Peso</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->peso }}</td>
                    <td>
                        <a href="{{ route("produtos.edit", ["id"=>$produto->id]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{ $produto->id }})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>

    {{ $produtos->links() }}

    <a href="{{ route("produtos.create", []) }}" class="btn btn-info">Adicionar</a>
 @stop

 @section("table-delete")
    "produtos"
 @stop()