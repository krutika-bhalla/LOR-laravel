<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LOA Management</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: maroon">
            <div class="container">
                @auth
                    <a class="navbar-brand" href="#">Form
                @else
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" style="max-height: 50px; max-width: 50px;">
                @endauth
{{--                    {{ config('app.name', 'Laravel') }}--}}
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
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color: #ffffff;">{{ __('Student Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color: #ffffff;">{{ __('Student Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: #ffffff;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ ucfirst(Auth::user()->name) }} <span class="caret"></span>
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <p class="footer">
            <span class="links">
                <span style="color: #636b6f;">Developed By:</span>
                <a  href="https://github.com/krutika-bhalla"> Krutika Bhalla,</a>
                <a  href="#">Prachi Harwara,</a>
                <a  href="#">Shruti Dharap</a> <span style="color: #636b6f">&</span>
                <a  href="#">Snehal Bamane</a>

            </span>
    </p>

    <style>
        .footer {
            background-color: white;
            color: #636b6f;
            width: 100%;
            /*position: fixed;*/
            bottom: 0;
            text-align: center;
        }
        .link1 {
            color: #636b6f;
        }
        .link2 {
            color: #636b6f;
        }
        main{
            min-height: calc(100vh - 55.03px - 50px);
        }
        .links > a {
            color: #636b6f;
            padding: 0 20px;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: .05rem;
            text-decoration: none;
            text-transform: uppercase;
            transition: .4s;
        }
        .links > a:hover{
            color: maroon;
        }
    </style>
</body>
</html>
