{!!GetDivRowIni($key,$attribute)!!}
<div class="{{GetColumns($attribute)}}">
    @switch($attribute)
        @case('id_genero')
        @case('id_talla_jersey')
        @case('id_talla_calcetas')
        @case('id_distancia')
        @case('id_categoria')
        @case('id_corral')
        @case('id_tipo_sangre')
            @include('partials.label')
            @include('partials.select')
            @include('partials.invalid-feedback')
        @break
        @case('c_terminos_condiciones')
        @case('c_reglamento')
        @case('c_menor_de')
        @case('c_conformidad')
        @case('c_conocimiento')
        @case('c_jersey')
        @case('c_bici_triatlon')
            <div class="icheck-primary form-check">
                @include('partials.checkbox')
                @include('partials.label')
                @include('partials.invalid-feedback')
            </div>
        @break
        @case('id_enteraste')
            <label>¿Cómo te enteraste del evento?</label></br>
            @foreach (GetSisTip($attribute) as $tip)
                <div class="icheck-primary form-check-inline">
                    @include('partials.radio')
                    @include('partials.label')
                </div>
            @endforeach
            @include('partials.invalid-feedback')
        @break
        @default
            @include('partials.label')
            @include('partials.input')
            @include('partials.invalid-feedback')
    @endswitch
</div>
{!!GetDivRowFin($key,$attribute)!!}
