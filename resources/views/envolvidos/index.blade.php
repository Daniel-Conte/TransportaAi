@extends('layouts.default')
@section('title', 'Listagem de Envolvidos')
@section('content_header')
    <h1>Envolvidos</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'envolvidos'])!!}
    <div class="sidebar-form">
        <div class="input-group">
            <input type="text" name="razao_social_filtro" class="form-control" style="width:80% !important;" placeholder="Pesquisa...">
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
            <th><i class="fa fa-fw fa-user"></i>CNPJ</th>
            <th><i class="fa fa-fw fa-user"></i>Razão Social</th>
            <th><i class="fa fa-fw fa-map-marker"></i>Cidade</th>
            <th></i>Ações</th>
        </thead>
        <tbody>
            @foreach($envolvidos as $envolvido)
            <tr>
                <td>{{ $envolvido->cnpj}}</td>
                <td>{{ $envolvido->razao_social}}</td>
                <td>{{ $envolvido->cidade->nome}}</td>
                <td>
                    <a href="{{ route('envolvidos.edit', ['id'=>\Crypt::encrypt($envolvido->id)]) }}" class="btn-sm btn-success">Editar</a>
                    <a href="#" onclick=" return ConfirmaExclusao({{$envolvido->id}})" class="btn-sm btn-danger">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$envolvidos->links()}}
    
    <a href="{{ route('envolvidos.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"envolvidos"
@endsection