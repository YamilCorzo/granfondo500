@extends($layout)
@php
use Illuminate\Support\Facades\Crypt;
@endphp
@section('content')

    @auth
        @RouteIsName('competidor')
            <form class="form-row bg-white shadow rounded py-3 px-4">
                <div class="col-md-2">
                    <a href="{{route('home')}}" class="btn btn-lg btn-outline-primary btn-block" role="button" data-toggle="tooltip" data-placement="top" title="Regresar">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="col-md-2 ">
                    {{-- <button type="button" class="btn btn-lg btn-outline-primary btn-block"
                    data-toggle="tooltip" data-placement="top" title="Reenviar">
                    <i class="fas fa-mail-bulk"></i></button> --}}
                    <a href="{{route('correo',[EncryptCompetidor($competidor)])}}" class="btn btn-lg btn-outline-primary btn-block"
                    role="button"
                    data-toggle="tooltip" data-placement="top" title="Reenviar">
                        <i class="fas fa-mail-bulk"></i>
                    </a>
                </div>
            </form>
        @endif
    @endauth
    @if($editar)
        <form class="bg-white shadow rounded py-4 px-4 justify-content-center" method="post"
            @auth
            @RouteIsName('competidor')action="{{route('competidor.update',[EncryptCompetidor($competidor)])}}"@endif
            @else
            action="{{route('formulario.update',[EncryptCompetidor($competidor)])}}"
            @endauth
        autocomplete="off">
        @method('PUT')
        @csrf
    @else
        <div class="bg-white shadow rounded py-4 px-4 justify-content-center">
    @endif
        <div class="row">
            <div class="col-sm-8 col-md-10 col-lg-12 mx-auto">
                @foreach ($cards as $card)
                    @include('partials.card',['headercard'=>$card['headercard'],'attributes'=>$card['attributes']])
                @endforeach
                @if($editar)<button type="submit" class="btn btn-outline-primary btn-lg btn-block shadow">Guardar</button>@endif
            </div>
        </div>
    @if($editar)
        </form>
    @else
        </div>
    @endif

@endsection

@if($editar)
    <script>
        function SelectGenero(obj) {
            var o = $('#id_distancia');
            var id_genero = parseInt($('option:selected', obj).val());
            var id_distancia = parseInt($('option:selected', o).val());
            Categorias(id_genero,id_distancia);
        };

        function SelectDistancia(obj) {
            var o = $('#id_genero');
            var id_distancia = parseInt($('option:selected', obj).val());
            var id_genero = parseInt($('option:selected', o).val());
            Categorias(id_genero,id_distancia);
        };

        function Categorias(id_genero,id_distancia) {
            if (id_genero > 0 && id_distancia > 0) {
                $.get("{!!url('categorias')!!}/"+id_genero+"/"+id_distancia, CargarCatgorias);
            } else {
                $('#id_categoria')
                    .find('option')
                    .not(':first')
                    .remove()
                    .end()
                    .val(0)
                    .trigger('change')
                ;
            }
        };

        function CargarCatgorias(data,status,xhr) {
            if (xhr.status == 200) {
                categorias = "";
                $.each(data, function (o, value) {
                    categorias += "<option value='" + value.id_categoria + "'>" + value.categoria + "</option>";
                });
                $('#id_categoria')
                    .find('option')
                    .remove()
                    .end()
                    .append(categorias)
                    .val(0)
                    .trigger('change')
                ;
            } else {
                console.log(xhr);
            }
        };

        function SelectCategoria(obj) {
            var id_categoria = parseInt($('option:selected', obj).val());
            Corral(id_categoria);
        };

        function Corral(id_categoria) {
            if (id_categoria > 0) {
                $.get("{!!url('corral')!!}/"+id_categoria, CargarCorral);
            } else {
                $('#id_corral')
                    .find('option')
                    .remove()
                    .end()
                    .append("<option value='0'>Sin Asignar</option>")
                    .val(0)
                ;
            }
        };

        function CargarCorral(data,status,xhr) {
            if (xhr.status == 200) {
                $('#id_corral')
                    .find('option')
                    .remove()
                    .end()
                    .append("<option value='" + data.id_tip + "'>" + data.des + "</option>")
                    .val(data.id_tip)
                ;
            } else {
                console.log(xhr);
            }
        };

    </script>
@endif

