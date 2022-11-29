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

    {!! Form::open(["route"=>["cidades.update", "id"=> \Crypt::encrypt($cidade->id)], "method"=> "put"]) !!}

    <div class="form-group">
        {!! Form::label("nome", "Nome:") !!}
        {!! Form::text("nome", $cidade->nome, ["class"=>"form-control", "required"]) !!}
    </div>

    <div class="form-group">
        {!! Form::label("uf", "Uf:") !!}
        {!! Form::select(
            "uf",
            array(
                "RS"=>"RS", 
                "SC"=>"SC", 
                "PR"=>"PR", 
                "MS"=>"MS", 
                "MT"=>"MT", 
                "GO"=>"GO", 
                "DF"=>"DF",
                "MG"=>"MG",
                "RJ"=>"RJ",
                "SP"=>"SP",
                "ES"=>"ES",
                "BA"=>"BA",
                "SE"=>"SE",
                "PB"=>"PB",
                "PE"=>"PE",
                "AL"=>"AL",
                "RN"=>"RN",
                "CE"=>"CE",
                "TO"=>"TO",
                "PI"=>"PI",
                "MA"=>"MA",
                "PA"=>"PA",
                "AP"=>"AP",
                "RR"=>"RR",
                "RO"=>"RO",
                "AM"=>"AM",
                "AC"=>"AC",
            ), 
            $cidade->uf, 
            ["class"=>"form-control", "required"]
        ) !!}
    </div>

    <div class="form-group">
        {!! Form::submit("Editar Cidade", ["class"=>"btn btn-primary"]) !!}
        {!! Form::reset("Limpar", ["class"=>"btn btn-default"]) !!}
    </div>

    {!! Form::close() !!}
@stop