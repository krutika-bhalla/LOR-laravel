<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LOA Management</title>
        <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <script src="https://kit.fontawesome.com/c8a4579880.js" crossorigin="anonymous"></script>
        <style>
            html, body {
                background-color: #fff;
                color: maroon;
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
                transition: .4s;
            }
            .links > a:hover{
                color: maroon;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .header img {
                float: left;
                width: 80px;
                height: 80px;
                background: #555;
            }

             .header h1 {
            position: relative;
            top: 18px;
            left: 10px;
            }
            .square_btn{
                position: relative;
                display: inline-block;
                font-weight: bold;
                padding: 0.25em 0.5em;
                text-decoration: none;
                color: maroon;
                background: #ECECEC;
                transition: .4s;
                font-size: large;
            }

            .square_btn:hover {
                background: maroon;
                color: white;
            }

            @media (max-width: 750px) {
                .header img {
                    float: left;
                    width: 20px;
                    height: 20px;
                    background: #555;
                }

                .header h1 {
                    position: relative;
                    top: 18px;
                    left: 10px;
                    font-size: 15px;
                }
            }
        </style>
    </head>
    <body>

        <div class="flex-center " >
            <div class="content">
                <div class="header">
                    <img src="{{ asset('images/logo.png') }}" style="display: inline" >
                    <h1 class="display-4" style="display: inline" ><span style="color: maroon"> K J Somaiya Institute of Engineering and Information Technology</span></h1>
                </div>

                <div class="title m-b-md" style="padding-top: 100px;">
                    LOA Records
                </div>

                <div class="links">
                    @if (Route::has('login'))
                        <div>
                            @auth
                                <a href="{{ url('/formdetails') }}" class="square_btn">
                                    <i class="fa fa-caret-right"></i> FORM
                                </a>

                            @else
                                <a href="{{ route('login') }}" class="square_btn">
                                    <i class="fas fa-sign-in-alt"></i> STUDENT LOGIN
                                </a>
                                <a href="auth/flogin" class="square_btn">
                                    <i class="fas fa-sign-in-alt"></i> STAFF LOGIN
                                </a>

{{--                                @if (Route::has('register'))--}}
{{--                                    <a href="{{ route('register') }}">Student Register</a>--}}
{{--                                @endif--}}
                            @endauth
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br>
        <p class="footer">
            <span class="links">
                <span style="color: #636b6f; font-weight: bold">Developed By:</span>
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
/* main{
    min-height: calc(100vh - 55.03px - 50px);
} */
</style>
    </body>
</html>
