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
            <th><i class="fa fa-fw fa-truck"></i>Transportadora</th>
            <th><i class="fa fa-fw fa-truck"></i>Veiculo</th>
            <th></i>Ações</th>
        </thead>
        <tbody>
            @foreach($transportes as $transporte)
            <tr>
                <td>{{ $transporte->remetente->razao_social}}</td>
                <td>{{ $transporte->destinatario->razao_social}}</td>
                <td>{{ $transporte->transportadora->razao_social}}</td>
                <td>{{ $transporte->veiculo->placa}}</td>
                <td>
                    <a href="{{ route('transportes.edit', ['id'=>\Crypt::encrypt($transporte->id)]) }}" class="btn-sm btn-success">Editar</a>
                    <a href="#" onclick=" return ConfirmaExclusao({{$transporte->id}})" class="btn-sm btn-danger">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$transportes->links()}}
    
    <a href="{{ route('transportes.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"transportes"
@endsection