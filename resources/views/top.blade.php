<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Laravel</title>

        <!-- Fonts -->
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
        
            .full-height {
                height: 100vh;
            }

            

            .flex-center {
                align-items: center;

                justify-content: center;
                background-color:#e2dbc6;
            }

            /* .position-ref {
                position: relative;
            } */

            .position-ref{
                position:relative;
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
            .clear{
                clear:both;
            }

            /* タイトル部分(ここまで) */


            @media screen and (max-width:540px){
                .title{
                    font-size:60px;
                }
            }
            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height ">
          
            @if (Route::has('login'))
                <div  class="row" style="background-color:yellow; margin-bottom:200px;">
                    @auth
                        <a href="{{ url('/main') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="col-sm-3 col-3">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="col-sm-3 col-3">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content" >
                <div class="title m-b-md">
                    Our<br>Arrangement
                </div>
            </div>
            <div class="clear">
        </div>
    </body>
</html>
