@switch($attribute)
    @case('c_terminos_condiciones')
    @case('c_reglamento')
    @case('c_menor_de')
    @case('c_conformidad')
    @case('c_conocimiento')
    @case('c_jersey')
    @case('c_bici_triatlon')
        <label class="form-check-label"for="{{$attribute}}">
            {!! config('granfondo.infocheck.'.$attribute) !!}
        </label>
    @break
    @case('id_enteraste')
        <label class="form-check-label form-inline"for="{{$tip->id_tip}}">
            {{$tip->des}}
        </label>
    @break
    @default
        <label for="{{$attribute}}">
            {{GetLabel($attribute)}}
        </label>
@endswitch
