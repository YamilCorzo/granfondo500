<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Bootstrap Table -->
    <link href="{{ asset('plugins/bootstrap-table/dist/bootstrap-table.min.css') }}">

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-table/dist/locale/bootstrap-table-es-MX.min.js') }}"></script>
    <script src="{{ asset('js/ready.js') }}"></script>
</head>
<body>
    <div id="app" class="d-flex flex-column h-screen justify-content-between">
        {{-- <section class="content-header">
            <h1>@yield('content_header')</h1>
        </section> --}}
        <main class="py-4">
            <div class="container">
                @include('partials.alertas')
                @yield('content')
            </div>
        </main>
        {{-- <section class="content">
            @include('partials.alertas')
            @yield('content')
        </section> --}}
        {{-- <footer classe="bg-white text-center text-black-50 py-3 shadow">
            {{config('app.name')}} | Copyright @ {{date('Y')}}
        </footer> --}}
    </div>
@if(session('urlori'))
    <script>
        let timerInterval
        Swal.fire({
            icon: 'success',
            text: '{{session('urlori')}}',
            timer: 5000,
            timerProgressBar: false,
            onBeforeOpen: () => {
                Swal.showLoading()
            },
            onClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            // if (result.dismiss === Swal.DismissReason.timer) {
                window.location.replace('http://deuxdemo.com/proyectos/granfondo/')
            // }
        });
    </script>
@endif
</body>
</html>
