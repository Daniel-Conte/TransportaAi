@extends('adminlte::page')

@section('content')
    <h3>Nova Cidade</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(["route"=>"cidades.store"]) !!}

    <div class="form-group">
        {!! Form::label("nome", "Nome:") !!}
        {!! Form::text("nome", null, ["class"=>"form-control", "required"]) !!}
    </div>

    <div class="form-group">
        {!! Form::label("uf", "Uf:") !!}
        {!! Form::text("uf", null, ["class"=>"form-control", "required"]) !!}
    </div>

    <div class="form-group">
        {!! Form::submit("Criar Cidade", ["class"=>"btn btn-primary"]) !!}
        {!! Form::reset("Limpar", ["class"=>"btn btn-default"]) !!}
    </div>

    {!! Form::close() !!}
@stop