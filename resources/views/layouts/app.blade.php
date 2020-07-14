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

    <!-- Bootstrap Table -->
    <link href="{{asset('plugins/bootstrap-table/dist/bootstrap-table.min.css') }}">

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="{{ asset('plugins/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-table/dist/locale/bootstrap-table-es-MX.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-table/dist/extensions/filter-control/bootstrap-table-filter-control.min.js') }}"></script>
    <script src="{{ asset('js/ready.js') }}"></script>
</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"> --}}
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background: #000 !important;"> <!-- bg-white -->
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @auth
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="http://deuxdemo.com/proyectos/granfondo/?autologin_code=elBjmpyBZuIAL1Y4aORjH00qnNhINfTh" target="_blank">
                                Administrar Tienda</a>
                            </li>

                                @RouteNotIsName('register')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home') }}">{{ __('Competidores') }}</a>
                                    </li>
                                @endif
                                @RouteNotIsName('password.request')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('password.update') }}">{{ __('Reset Password') }}</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home') }}">{{ __('Competidores') }}</a>
                                    </li>
                                @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @include('partials.alertas')
                @yield('content')
            </div>
        </main>
    </div>

<script>
    function Procesando() {
        Swal.fire({
            text: 'Procesando',
            allowOutsideClick: false,
            allowEscapeKey: false,
            timerProgressBar: false,
            onBeforeOpen: () => {
                Swal.showLoading()
            }
        });
    };
</script>
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
                window.location.replace('https://www.granfondo500.com/')
            // }
        });
    </script>
@endif
@yield('js')
</body>
</html>
