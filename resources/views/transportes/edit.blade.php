@extends('adminlte::page')

@section('content')
    <h3>Editando Transporte: {{ $transporte->cnpj }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    {!! Form::open(["route"=>["transportes.update", "id"=> \Crypt::encrypt($transporte->id)], "method"=> "put"]) !!}

        <div class="form-group">
            {!! Form::label('remetente_id', 'Remetente:') !!}
            {!! Form::select('remetente_id',
                \App\Envolvido::orderBy('razao_social')->pluck('razao_social', 'id')->toArray(),
                $transporte->remetente_id, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('destinatario_id', 'Destinatario:') !!}
            {!! Form::select('destinatario_id',
                \App\Envolvido::orderBy('razao_social')->pluck('razao_social', 'id')->toArray(),
                $transporte->destinatario_id, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('transportadora_id', 'Transportadora:') !!}
            {!! Form::select('transportadora_id',
                \App\Envolvido::orderBy('razao_social')->pluck('razao_social', 'id')->toArray(),
                $transporte->transportadora_id, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('veiculo_id', 'Veiculo:') !!}
            {!! Form::select('veiculo_id',
                \App\Veiculo::orderBy('placa')->pluck('placa', 'id')->toArray(),
                $transporte->veiculo_id, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Transporte', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}
@stop