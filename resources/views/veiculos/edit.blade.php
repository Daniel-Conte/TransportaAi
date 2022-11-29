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

    {!! Form::open(["route"=>["veiculos.update", "id"=> \Crypt::encrypt($veiculo->id)], "method"=> "put"]) !!}

    <div class="form-group">
        {!! Form::label("placa", "Placa:") !!}
        {!! Form::text("placa", $veiculo->placa, ["class"=>"form-control text-uppercase", 'id'=>'field_placa', "required"]) !!}
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

@section("js")
    <script>
        $(document).ready(function() {
            $("#field_placa").mask("AAA-9A99")

            $('form').on('submit', function(){
                $('#field_placa').unmask();
            });
        })
    </script>
@stop