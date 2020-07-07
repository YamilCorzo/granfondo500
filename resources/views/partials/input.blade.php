<input @if(!$editar) disabled @endif
type="{{GetTypee($attribute)}}"
class="form-control {{GetCelTel($attribute)}} @include('partials.is-valid')"
name="{{$attribute}}"
id="{{$attribute}}"
@if ($attribute == 'edad') min="15" @endif
value="{{old($attribute, GetValue($competidor,$attribute))}}"
@if ($attribute == 'id_evento') readonly @endif
>
