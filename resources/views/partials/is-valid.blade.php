@if($errors->has($attribute))
is-invalid
@else
    @if($errors->isNotEmpty() && !$errors->has('message'))
    is-valid
    @endif
@endif
