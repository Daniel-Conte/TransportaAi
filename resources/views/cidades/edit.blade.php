@extends('adminlte::page')

@section('content')
    <h3>Editando Cidade: {{ $cidade->nome }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(["route"=>["cidades.update", "id"=> $cidade->id], "method"=> "put"]) !!}

    <div class="form-group">
        {!! Form::label("nome", "Nome:") !!}
        {!! Form::text("nome", $cidade->nome, ["class"=>"form-control", "required"]) !!}
    </div>

    <div class="form-group">
        {!! Form::label("uf", "Uf:") !!}
        {!! Form::text("uf", $cidade->uf, ["class"=>"form-control", "required"]) !!}
    </div>

    <div class="form-group">
        {!! Form::submit("Editar Cidade", ["class"=>"btn btn-primary"]) !!}
        {!! Form::reset("Limpar", ["class"=>"btn btn-default"]) !!}
    </div>

    {!! Form::close() !!}
@stop