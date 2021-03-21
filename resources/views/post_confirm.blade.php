<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <style>
  
  body{
    background-color:#e2dbc6;
  }
  .container{
    text-align:center;
  }

  .material{
    background-color:pink;
    height:auto;
    position:relative;
    width:100%;
    margin:0;
  }

  .material-about{
    background-color:white;
    margin-bottom:100px;
  }

  .normal{
    background-color:white; 
    color:black; 
    border:1px solid black;
  }

  .loved{
    background-color:blue; 
    color:white; 
    border:1px solid black;
  }

  .btn-to-top{
    position:fixed;
    bottom:5px;
    left:100px;
    z-index:1;
  }
  .btn-to-back{
    position:fixed;
    bottom:5px;
    right:100px;
    z-index:1;
  }



  @media screen and (max-width:540px){
    .head-title>h1{
      font-size:25px;
    }

    .btn-to-top{
      left:50px;
    }
    .btn-to-back{
      right:50px;
    }
  }
 

  </style>
</head>
<body style="position:relative;">
  <!-- container(ここから) -->
  <div class=" container">
    <div style="margin-bottom:50px;">以下が投稿内容です。</div>
    <div class="head-title row" style="background-color:yellow; margin-bottom:50px;">
      <div id="jump"></div>
      <h1 class="col-sm-12 col-12">タイトル:「{{$post->name}}」</h1>
    </div>

    
    <div class="card" style="margin-bottom:100px;">
      <div class="card-header">材料</div>
      <div class="card-body row col-sm-12 col-12">
        <p class="col-sm-9 col-8" style="text-align:left;">{!! nl2br($post->material) !!}</p>
        <img class="col-sm-3 col-4" src="{{$post->icon_picture}}">
      </div>
    </div>

    @foreach($steps as $step)
    <div class="card" style="margin-bottom:50px;">
      <div class="card-header">手順{{$step_num++}}</div>
        <div class="card-body row">
          <p class="col-sm-9 col-8" style="text-align:left;">{{$step->about}}</p>
          <img  class="col-sm-3 col-4"  src="{{$step->picture}}">
        </div>
      </div>
    @endforeach
  </div>
  <!-- container(ここまで) -->
  <footer>
  </footer>
  <a class="btn-to-top btn btn-primary col-sm-4 col-4" href="#jump">ページのTopへ</a>
  <a class="btn-to-back btn btn-danger col-sm-4 col-4" href="/main">戻る</a>


</body>

</html>
