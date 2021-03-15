<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
                background-color:#e2dbc6;
            }

            /* .position-ref {
                position: relative;
            } */

            .position-ref{
                position:relative;
            }
            .top-right{
                position:absolute;
                right: 10px;
                top: 50px;  
            }
            
            .content {
                text-align: center;
                width:100vw;
            }

            .title {
                font-size: 84px;
                color:#89c3eb;
                text-shadow:3px 3px white;
                border-top:5px solid #89c3eb;
                padding-top:150px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 30px;
                font-weight: 400;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            

            .m-b-md {
                margin-bottom: 30px;
            }

            .box{
                border:5px solid #89c3eb;
                background-color:#f0ece8;
                color:#89c3eb;
                padding:5px;
                border-radius:5px;
                box-shadow:2px 5px white;
            }

            .box:active{
                box-shadow:none;
                padding-top:5px;
            }
            
            @media screen and (max-width:540px){
                .title{
                    font-size:60px;
                }
            }
            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}"><span class="box">ログイン</span></a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"><span class="box">登録</span></a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Our<br>Arrangement
                </div>

                <!-- <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->
            </div>
        </div>
    </body>
</html>
