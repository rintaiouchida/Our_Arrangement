<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
     
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

            .head>a{
                display:inline-block;
                text-decoration:none;
                color:#89c3eb;
                text-shadow:1px 1px white;
                line-height:60px;
                font-size:25px;
                font-weight:bold;
            }
            .head>a:hover{
                opacity:0.5;
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
                <div  class="row head" style="background-color:#c1c0b9;height:60px; margin-bottom:200px;">
                    @auth
                        <a href="{{ url('/main') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}" style="margin-left:25%;">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"style="margin-left:30%;">登録</a>
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
