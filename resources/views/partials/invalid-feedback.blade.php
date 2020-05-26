{{-- @if($errors->has($attribute))
    <span class="invalid-feedback" role="alert">
        <strong>{{$errors->first($attribute)}}</strong>
    </span>
@else
    @if($attribute == 'id_categoria')<span class="form-text text-primary">*Las categorías que se muestren dependerán de la selección de género y distancia.</span>@endif
    @if($attribute == 'id_corral')<span class="form-text text-primary">*El corral asignado dependerá de la categoría seleccionada o si el paquete comprado es VIP.</span>@endif
@endif --}}
@error($attribute)
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
@else
    @if($attribute == 'id_categoria')<span class="form-text text-primary">*Las categorías que se muestren dependerán de la selección de género y distancia.</span>@endif
    @if($attribute == 'id_corral')<span class="form-text text-primary">*El corral asignado dependerá de la categoría seleccionada o si el paquete comprado es VIP.</span>@endif
@enderror
