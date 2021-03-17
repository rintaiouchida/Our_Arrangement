<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <style>
    footer{
    height:50px;
    background-color:#c1c0b9;
    position:fixed;
    bottom:0;
    left:0;
    width:100%;
    z-index:0;
  }
  .btn-to-top{
    position:fixed;
    bottom:5px;
    left:0;
    z-index:1;
  }

  @media screen and (max-width:540px){
    .btn-to-top{
    position:fixed;
    bottom:5px;
    left:40%;
    z-index:1;
    }
  }
  </style>
</head>
<body>
<div class="container col-md-12">
    <!-- <div class="btn2">
      <a class="btn btn-primary" href="#jump">ページのTopへ</a>
    </div> -->
    <div class="top" id="jump">いいね数ランキング</top>
    <div class="main col-md-12">
      @if(!empty($ranks))
      @foreach($ranks as $rank)
      <a href="/menu/{{$rank->id}}" class="box col-md-5 ">
      <img src="{{$rank->icon_picture}}" style="width:100%; height:100%;display:block;"></img>
      <div class="title">第:{{$rank_num++}}位<br>タイトル:{{$rank->name}}</div>
      
      </a>
      
      @endforeach
      @endif
      
      
    </div>
    <footer>
    </footer>
    <div class="btn-to-top">
      <a class="btn btn-primary" href="#jump">ページのTopへ</a>
    </div>
    
  </div>
</body>
</html>
