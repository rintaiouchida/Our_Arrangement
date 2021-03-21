<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                position:relative;
            }
            header{
                position:fixed;
                background-color:#c1c0b9;
                height:100px;
                width:100%;
                top:0;
                left:0;
                z-index:0;
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
            
            /* タイトル部分 */
            .content {
                text-align: center;
                width:100vw;
            }

            .title {
                font-size: 84px;
                color:#89c3eb;
                text-shadow:3px 3px white;
            }
            .m-b-md {
                margin-bottom: 30px;
            }

            /* タイトル部分(ここまで) */

            .btn-to-main{
                position:fixed;
                top:30px;
                left:50%;
                z-index:1;
            }
            .btn-to-login{
                position:fixed;
                top:30px;
                right:100px;
                z-index:1;
            }
            .btn-to-register{
                position:fixed;
                top:30px;
                left:100px;
                z-index:1;
            }
            
            @media screen and (max-width:540px){
                .title{
                    font-size:60px;
                }

                .btn-to-login{
                right:50px;
                z-index:1;
            }
                .btn-to-register{
                    left:50px;
                }
            }
            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <header>
            </header>
                        <a class="btn-to-login col-sm-3 col-4 btn btn-danger" href="{{ route('login') }}">メイン画面へ</a>
                        @if (Route::has('register'))
                        <a class="btn-to-register col-sm-3 col-4 btn btn-primary" href="{{ route('register') }}">登録</a>
                        @endif
            <div class="content">
                <div class="title m-b-md">
                    Our<br>Arrangement
                </div>
                <div class="row">
                <a class=" col-sm-3 offset-sm-1 col-4 offset-1 btn btn-danger" href="{{ route('login') }}">メイン画面へ</a>
                <div class="col-sm-4 col-2"></div>
                @if (Route::has('register'))
                <a class=" col-sm-3 offset-sm-1 col-4  btn btn-primary" href="{{ route('register') }}">登録</a>
                @endif
                </div>
            </div>
        </div>
    </body>
</html>
