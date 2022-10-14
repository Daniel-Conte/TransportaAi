@extends('adminlte::page')

@section('content')
    <h3>Novo Veículo</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(["route"=>"veiculos.store"]) !!}

    <div class="form-group">
        {!! Form::label("placa", "Placa:") !!}
        {!! Form::text("placa", null, ["class"=>"form-control", "required"]) !!}
    </div>

    <div class="form-group">
        {!! Form::label("capacidade_carga", "Capacidade de carga:") !!}
        {!! Form::number("capacidade_carga", null, ["class"=>"form-control", "required"]) !!}
    </div>

    <div class="form-group">
        {!! Form::submit("Criar Veículo", ["class"=>"btn btn-primary"]) !!}
        {!! Form::reset("Limpar", ["class"=>"btn btn-default"]) !!}
    </div>

    {!! Form::close() !!}
@stop