<input @if(!$editar) disabled @endif
type="{{GetTypee($attribute)}}"
class="form-control {{GetCelTel($attribute)}} @include('partials.is-valid')"
name="{{$attribute}}"
id="{{$attribute}}"
value="{{old($attribute,GetValue($competidor,$attribute))}}"
>
