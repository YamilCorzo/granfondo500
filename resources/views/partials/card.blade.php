<div class="form-group">
    <div class="card bg-white shadow rounded">
        <div class="card-header">{{$headercard}}</div>
        <div class="card-body">
            @foreach ($attributes as $key => $attribute)
                @include('partials.control',['key'=>$key,'attribute'=>$attribute])
            @endforeach
        </div>
    </div>
</div>
