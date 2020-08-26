@extends('layouts.app')

@section('content')
<div class="card bg-white shadow rounded">
    <div class="card-header fondo-login">Gráficas</div>
        <div class="card-body">

            <div class="panel-body">
            {!! $chart_estado->container() !!}
            </div>

            <div class="panel-body">
            {!! $chart_edad->container() !!}
            </div>

            <div class="panel-body">
            {!! $chart_distancia->container() !!}
            </div>

            <div class="panel-body">
            {!! $chart_genero->container() !!}
            </div>

            <div class="panel-body">
            {!! $chart_categoria->container() !!}
            </div>

            <div class="panel-body">
            {!! $chart_paquetes->container() !!}
            </div>

            <div class="panel-body">
            {!! $chart_calcetas->container() !!}
            </div>

            <div class="panel-body">
            {!! $chart_jerseys->container() !!}
            </div>

            <div class="panel-body">
            {!! $chart_registro->container() !!}
            </div>

    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
 {!! $chart_estado->script() !!}
 {!! $chart_edad->script() !!}
 {!! $chart_distancia->script() !!}
 {!! $chart_genero->script() !!}
 {!! $chart_categoria->script() !!}
 {!! $chart_paquetes->script() !!}
 {!! $chart_calcetas->script() !!}
 {!! $chart_jerseys->script() !!}
 {!! $chart_registro->script() !!}
 @endsection


