@extends('layouts.app')

@section('content')
<form class="rounded py-3 px-4"> <!-- bg-white shadow -->
        <div class="card bg-white shadow rounded">
            <div class="card-header fondo-login">Competidores</div>
            <div class="card-body">
                <div id="toolbar">
                    <div class="form-inline" role="form">
                        <div class="form-group">
                            <button type="button" class="btn btn-outline-primary"
                            data-toggle="tooltip" data-placement="top" title="Reenviar"
                            onclick="Enviar(); return false;">
                                <i class="fas fa-mail-bulk"></i>
                            </button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-outline-primary"
                            data-toggle="tooltip" data-placement="top" title="Exportar"
                            onclick="Export(); return false;">
                                <i class="fas fa-file-csv"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <table
                id="tcompetidores"
                data-toggle="table"
                data-toolbar="#toolbar"
                data-search="true"
                data-show-refresh="true"
                data-show-toggle="false"
                data-show-columns="true"
                data-click-to-select="true"
                data-minimum-count-columns="1"
                data-pagination="true"
                data-page-list="[10, 25, 50, 100, all]"
                data-url="{{route('registros')}}"
                data-classes="table table-bordered table-striped table-borderless table-responsive-md"
                data-buttons-class="btn btn-outline-primary"
                data-filter-control="true"
                data-show-export="false"
                data-toolbar-align="right"
                >
                <thead class="bg-gradient-info text-white">
                <tr>
                    <th data-field="state" data-align="center" data-checkbox="true"></th>
                    <th data-align="center" data-sortable="true" data-field="ticket">Ticket</th>
                    <th data-align="center" data-sortable="true" data-field="id">Número</th>
                    <th data-align="center" data-sortable="true" data-field="nombre">Nombre</th>
                    <th data-align="center" data-sortable="true" data-field="correo">Correo</th>
                    <th data-filter-control="select" data-align="center" data-sortable="true" data-field="estatus">Estatus</th>
                    <th data-switchable="false" data-align="center" data-field="id_link">Editar</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
        </div>
</form>
@endsection
@section('js')
<script>
    const btnalert = '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    function Enviar() {
        var result = $.map($('#tcompetidores').bootstrapTable('getSelections'), function (row) {
                            return row.id
                        });
        if (result.length > 0) {
            Procesando();
            var ids = JSON.stringify(result);
            $.get("{!!url('correos')!!}/"+ids, ResultEnviar).fail(ResultEnviar);
        }
    };

    function Export() {
        $('#tcompetidores').bootstrapTable('togglePagination');
        $('#tcompetidores').tableExport({
            fileName: 'GranFondo500',
            ignoreColumn: ['state','id_link']
        });
        $('#tcompetidores').bootstrapTable('togglePagination');
    };

    function ResultEnviar(data,status,xhr) {
        Swal.close();
        if (xhr.status == 200) {
            $('#successmsj').html(btnalert+data.msj).show().fadeOut(10000);
        } else {
            $('#dangermsj').html(btnalert+data.responseJSON.msj).show().fadeOut(10000);
        }
    };

    $('#tcompetidores').bootstrapTable({
        locale:'es-MX',
        pagination: true,
        pageList: [10, 25, 50, 100, 500, 'Todo'],
        search: true,
        searchAlign: 'left',
        showExport: true,
        exportDataType: 'all',
        exportTypes:['csv', 'txt', 'xlsx'],
    });
</script>
@stop
