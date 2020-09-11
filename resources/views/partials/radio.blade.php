<input @if(!$editar) disabled @endif
type="radio"
name="{{$attribute}}" id="{{$tip->id_tip}}" value="{{$tip->id_tip}}"
class="form-check-input @include('partials.is-valid')"
{{old($attribute) == $tip->id_tip || GetValue($competidor,$attribute) == $tip->id_tip ? 'checked' : '' }}
>





