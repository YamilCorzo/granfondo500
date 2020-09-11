@if($errors->has($attribute))
is-invalid
@else
    @if($errors->isNotEmpty() && !$errors->has('message') && $attribute != 'otro')
    is-valid
    @endif
@endif
