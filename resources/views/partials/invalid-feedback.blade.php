@error($attribute)
    <span class="@if($attribute == 'id_enteraste') form-text text-danger @else invalid-feedback @endif" role="alert" @if($attribute == 'id_enteraste') style="font-size: 80%;" @endif>
        <strong>{{$message}}</strong>
    </span>
@else
    @if($attribute == 'id_genero')<span class="form-text text-primary">*Las opciones de género que se ofrecen son únicamente para fines de determinar la categoría del ciclista.</span>@endif
    @if($attribute == 'id_categoria')<span class="form-text text-primary">*Las categorías que se muestren dependerán de la selección de género y distancia.</span>@endif
    @if($attribute == 'id_corral')<span class="form-text text-primary">*El corral asignado dependerá de la categoría seleccionada o si el paquete comprado es VIP.</span>@endif
@enderror
