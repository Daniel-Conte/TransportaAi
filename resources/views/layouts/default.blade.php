@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('js')
    <script>
        function ConfirmaExclusao(id){
            swal.fire({
                title: 'Confirma a exclusão?', text: "Esta ação não poderá ser revertida",
                type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33', confirmButtonText: 'Sim, excluir!',
                cancelButtonTexr: 'Cancelar!', closeOnConfirm: false,
            }).then(function(isConfirm){
                if (isConfirm.value){
                    $.get('/'+@yield('table-delete') + '/'+id+'/destroy', function(data){
                        swal.fire(
                            'Deletado!',
                            'Exclusão confirmada.',
                            'success'
                        ).then(function(){
                            window.location.reload();
                        });
                    });
                }
            })
        }
    </script>  
@stop
