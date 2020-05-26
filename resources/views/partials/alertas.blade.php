@if($errors->has('message'))
<div></div>
    <div id="message" class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{$errors->first('message')}}
    </div>
    <script>
        $("#message").fadeOut(10000);
    </script>
@elseif(session('warning'))
    <div id="warning" class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{session('warning')}}
    </div>
    <script>
        $("#warning").fadeOut(10000);
    </script>
@elseif(session('success'))
    <div id="success" class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{session('success')}}
    </div>
    <script>
        $("#success").fadeOut(5000);
    </script>
@elseif(session('info'))
    <div id="info" class="alert alert-info" role="alert">

        {{session('info')}}
    </div>
    <script>
        $("#info").fadeOut(5000);
    </script>
@elseif(session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
@endif
<div id="dangermsj" class="alert alert-danger" role="alert" style="display: none;">
</div>
<div id="successmsj" class="alert alert-success" role="alert" style="display: none;">
</div>
