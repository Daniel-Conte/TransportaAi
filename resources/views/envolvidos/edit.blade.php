@extends('adminlte::page')

@section('content')
    <h3>Editando Envolvido: {{ $envolvido->razao_social }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    {!! Form::open(["route"=>["envolvidos.update", "id"=> \Crypt::encrypt($envolvido->id)], "method"=> "put"]) !!}

        <div class="form-group">
            {!! Form::label('cnpj', 'Cnpj:') !!}
            {!! Form::text('cnpj', $envolvido->cnpj, ['class'=>'form-control', 'id'=>'field_cnpj', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('razao_social', 'Razão Social:') !!}
            {!! Form::text('razao_social', $envolvido->razao_social, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('cidade_id', 'Cidade:') !!}
            {!! Form::select('cidade_id',
                \App\Cidade::orderBy('nome')->pluck('nome', 'id')->toArray(),
                    $envolvido->cidade_id, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Envolvido', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}
@stop

@section("js")
    <script>
        $(document).ready(function() {
            $("#field_cnpj").mask("99.999.999/9999-99");

            $('form').on('submit', function(){
                $('#field_cnpj').unmask();
            });
        })
    </script>
@stop