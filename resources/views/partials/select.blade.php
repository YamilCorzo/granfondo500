@php
$categorias = null;
if ($attribute == 'id_categoria') {
    $categorias = GetCategorias(old('id_genero',$competidor->id_genero),old('id_distancia',$competidor->id_distancia));
}
@endphp

<select @if(!$editar) disabled @endif
class="form-control @include('partials.is-valid')"
name="{{$attribute}}" id="{{$attribute}}"
{!!Getonchange($attribute,$competidor->vip)!!}
>
@if($attribute == 'id_categoria')
    @if($categorias instanceof Traversable)
        @foreach($categorias as $categoria)
            <option @if(old($attribute,GetValue($competidor,$attribute)) == $categoria->id_categoria) selected @endif
            value="{{$categoria->id_categoria}}">{{$categoria->categoria}}</option>
        @endforeach
    @else
        <option value="{{$categorias->id_categoria}}">{{$categorias->categoria}}</option>
    @endif
@elseif($attribute == 'id_corral')
    {!!SetCorral(old($attribute,GetValue($competidor,$attribute)))!!}
@else
    @forelse (GetSisTip($attribute) as $tip)
        <option @if(old($attribute,GetValue($competidor,$attribute)) == $tip->id_tip) selected @endif
            value="{{$tip->id_tip}}">{{$tip->des}}</option>
    @empty
        {!!GetSisTipCero()!!}
    @endforelse
@endif
</select>
