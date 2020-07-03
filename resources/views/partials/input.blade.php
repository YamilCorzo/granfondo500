<input @if(!$editar) disabled @endif
type="{{GetTypee($attribute)}}"
class="form-control {{GetCelTel($attribute)}} @include('partials.is-valid')"
name="{{$attribute}}"
id="{{$attribute}}"
@if ($attribute == 'edad')
min="15"
	@if (GetValue($competidor,$attribute) == 0)
		value="{{old($attribute, 15)}}"
	@endif 
@else
value="{{old($attribute, GetValue($competidor,$attribute))}}"
@endif
>
