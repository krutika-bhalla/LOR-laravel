<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LOA Management</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 70px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 20px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center " >
            <div class="content">
                <h1 class="display-4">K J Somaiya Institute of Engineering and Information Technology</h1>
                <div class="title m-b-md" style="padding-top: 100px">
                    LOA Management
                </div>

                <div class="links">
                    @if (Route::has('login'))
                        <div class="links">
                            @auth
                                 <a href="{{ url('/formdetails') }}">Form</a>

                            @else
                                <a href="{{ route('login') }}">Student Login</a>

{{--                                @if (Route::has('register'))--}}
{{--                                    <a href="{{ route('register') }}">Student Register</a>--}}
{{--                                @endif--}}
                            @endauth

                            <a href="auth/flogin">Staff Login</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </body>
</html>
