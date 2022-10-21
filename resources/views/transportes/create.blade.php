@extends('adminlte::page')

@section('content')
    <h3>Novo Transporte</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    


    {!! Form::open(['route'=>'transportes.store']) !!}

        <div class="form-group">
            {!! Form::label('remetente_id', 'Remetente:') !!}
            {!! Form::select('remetente_id',
                \App\Envolvido::orderBy('razao_social')->pluck('razao_social', 'id')->toArray(),
                null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('destinatario_id', 'Destinatario:') !!}
            {!! Form::select('destinatario_id',
                \App\Envolvido::orderBy('razao_social')->pluck('razao_social', 'id')->toArray(),
                null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('transportadora_id', 'Transportadora:') !!}
            {!! Form::select('transportadora_id',
                \App\Envolvido::orderBy('razao_social')->pluck('razao_social', 'id')->toArray(),
                null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('veiculo_id', 'Veiculo:') !!}
            {!! Form::select('veiculo_id',
                \App\Veiculo::orderBy('placa')->pluck('placa', 'id')->toArray(),
                null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Transporte', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}
@stop