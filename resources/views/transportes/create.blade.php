@extends('adminlte::page')
@section("plugins.Sweetalert2", true)

@if(Session::has("message"))
    <p class="alert alert-danger">{{ Session::get("message") }}</p>
@endif

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
                null, ['class'=>'form-control text-uppercase', 'id'=>'field_veiculo', 'required']) !!}
        </div>

        <h4>Produtos</h4>
        <div class="input_fields_wrap"></div>
        <br>

        <button type="button" style="float:right;" class="add_field_button btn btn-default">Adicionar Produto</button>

        <br>
        <hr>

        <div class="form-group">
            {!! Form::submit('Criar Transporte', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}
@stop

@section("js")
    <script>
        $(document).ready(function() { 
            $("#field_veiculo > option").mask("AAA-9A99"); 

            var wrapper = $(".input_fields_wrap")
            var add_button = $(".add_field_button")
            var x = 0;

            var myarray = []
            var previousValue = 0
            var previousIndex = 0
            
            $(add_button).click(function(e) {
                x++;
                var newField = `
                <div style="display: flex; padding: 0.5rem 0;">
                    <div style="width:80%" id="produto">
                        {!! Form::select("produtos[]", \App\Produto::orderBy("descricao")->pluck("descricao", "id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=> "Selecione um produto"]) !!}
                    </div>
                    <div style="width:14%; padding: 0 0.5rem;">
                        {!! Form::number("quantidade[]", null, ["class"=>"form-control", "required"]) !!}
                    </div>

                    <button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                </div>
                `;

                $(wrapper).append(newField);
            });

            $(wrapper).on("click", ".remove_field", function(e) {
                e.preventDefault();

                selectedValue = $(this).parent('div').find(":selected").val()
                var myIndex = myarray.indexOf(selectedValue)
                if(myIndex !== -1) {
                    myarray.splice(myIndex, 1)
                }

                $(this).parent("div").remove();
                x--;
            })

            $(wrapper).on("focus", "select", function(e) {
                e.preventDefault()

                previousValue = $(this).find(":selected").val()
                previousIndex = $(this).find(":selected").index()
            })

            $(wrapper).on("change", "select", function(e) {
                e.preventDefault()

                selectedValue = $(this).find(":selected").val()

                if(myarray.find(element => element == selectedValue)) {
                    Swal.fire('Produto já se encontra na lista de produtos do transporte!',
                            "Por favor, selecione outro produto.",
                            "warning")
                    $(this).prop("selectedIndex", previousIndex)
                } else {
                    var index = myarray.indexOf(previousValue)
                    if(index !== -1) {
                        myarray[index] = selectedValue
                    }
                }
            })
        })
    </script>
@stop