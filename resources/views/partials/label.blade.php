@switch($attribute)
    @case('c_terminos_condiciones')
    @case('c_reglamento')
    @case('c_menor_de')
    @case('c_conformidad')
    @case('c_conocimiento')
        <label class="form-check-label"for="{{$attribute}}">
            {{config('granfondo.infocheck.'.$attribute)}}
        </label>
    @break
    @default
        <label for="{{$attribute}}">
            {{GetLabel($attribute)}}
        </label>
@endswitch
