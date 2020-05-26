<input @if(!$editar) disabled @endif
type="checkbox"
name="{{$attribute}}" id="{{$attribute}}"
class="form-check-input @include('partials.is-valid')"
{{old($attribute) == 'on' || GetValue($competidor,$attribute) == 1 ? 'checked' : '' }}
>
