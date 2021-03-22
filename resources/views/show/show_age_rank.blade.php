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
    .btn-to-top{
      left:50px;
    }
    .btn-to-back{
      right:50px;
    }
  }
  </style>
</head>
<body>
<div class="container col-md-12">
    <!-- <div class="btn2">
      <a class="btn btn-primary" href="#jump">ページのTopへ</a>
    </div> -->
    <div class="top" id="jump" style="color:#89c3eb;
    text-shadow:1px 1px white; font-size:40px;">いいね数ランキング</top>
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
    
      <a class="btn-to-top btn btn-primary col-sm-3 col-4" href="#jump" style="text-shadow:none;">ページのTopへ</a>
      <a class="btn-to-back btn btn-danger col-sm-3 col-4" href="/main" style="text-shadow:none;">メイン画面へ</a>
    
    
  </div>
</body>
</html>
