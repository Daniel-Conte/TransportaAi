@extends('adminlte::page')

@section('content')
    <h3>Editando Veículo: {{ $veiculo->placa }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(["route"=>["veiculos.update", "id"=> $veiculo->id], "method"=> "put"]) !!}

    <div class="form-group">
        {!! Form::label("placa", "Placa:") !!}
        {!! Form::text("placa", $veiculo->placa, ["class"=>"form-control", "required"]) !!}
    </div>

    <div class="form-group">
        {!! Form::label("capacidade_carga", "Capacidade de carga:") !!}
        {!! Form::number("capacidade_carga", $veiculo->capacidade_carga, ["class"=>"form-control", "required"]) !!}
    </div>

    <div class="form-group">
        {!! Form::submit("Editar Veículo", ["class"=>"btn btn-primary"]) !!}
        {!! Form::reset("Limpar", ["class"=>"btn btn-default"]) !!}
    </div>

    {!! Form::close() !!}
@stop