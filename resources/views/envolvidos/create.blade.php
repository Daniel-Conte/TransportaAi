@extends('adminlte::page')

@section('content')
    <h3>Novo Envolvido</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    


    {!! Form::open(['route'=>'envolvidos.store']) !!}

        <div class="form-group">
            {!! Form::label('cnpj', 'Cnpj:') !!}
            {!! Form::text('cnpj', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('razao_social', 'Razão Social:') !!}
            {!! Form::text('razao_social', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('cidade_id', 'Cidade:') !!}
            {!! Form::select('cidade_id',
                \App\Cidade::orderBy('nome')->pluck('nome', 'id')->toArray(),
                null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Envolvido', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}
@stop