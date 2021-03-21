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
                height:60px;
            }
            .btn-to-login{
                position:fixed;
                top:15px;
                right:150px;
                z-index:1;
                background-color:white;
                height:60px;
                width:200px;
                text-align:center;
                border-radius:5%;
                border:5px solid blue;
            }
            .btn-to-register{
                position:fixed;
                top:15px;
                left:150px;
                z-index:1;
                background-color:white;
                height:60px;
                width:200px;
                text-align:center;
                border-radius:5%;
                border:5px solid blue;
            }
            .btn-to-login>a,.btn-to-register>a{
                text-decoration:none;
                color:black;
                line-height:60px;
                font-size:15px;
                font-weight:bold;
             }
            
            @media screen and (max-width:540px){
                .title{
                    font-size:60px;
                }

                .btn-to-login{
                right:80px;
                z-index:1;
                width:120px;
            }
                .btn-to-register{
                    left:80px;
                    width:120px;
                }
            }
            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <header>
            </header>
                        <div class="btn-to-login"><a  href="{{ route('login') }}">メイン画面へ</a></div>
                        @if (Route::has('register'))
                        <div class="btn-to-register"><a  href="{{ route('register') }}">登録</a></div>
                        @endif
            <div class="content">
                <div class="title m-b-md">
                    Our<br>Arrangement
                </div>
            </div>
        </div>
    </body>
</html>
