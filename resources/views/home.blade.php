@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row pt-3 justify-content-center">
        <div class="col-3">
            <div class="card">
                <div class="card-header d-flex justify-content-center">Produtos</div>

                <div class="card-body d-flex justify-content-center" style="font-size: 1.5rem"> 
                    {{App\Produto::count()}} 
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card">
                <div class="card-header d-flex justify-content-center">Cidades</div>

                <div class="card-body d-flex justify-content-center" style="font-size: 1.5rem"> 
                    {{App\Cidade::count()}} 
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card">
                <div class="card-header d-flex justify-content-center">Veículos</div>

                <div class="card-body d-flex justify-content-center" style="font-size: 1.5rem"> 
                    {{App\Veiculo::count()}} 
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-3 justify-content-center">
        <div class="col-3">
            <div class="card">
                <div class="card-header d-flex justify-content-center">Envolvidos</div>

                <div class="card-body d-flex justify-content-center" style="font-size: 1.5rem"> 
                    {{App\Envolvido::count()}} 
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card">
                <div class="card-header d-flex justify-content-center">Transportes</div>

                <div class="card-body d-flex justify-content-center" style="font-size: 1.5rem"> 
                    {{App\Transporte::count()}} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
