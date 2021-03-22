<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

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
  <div class="container col-12">
    <div class="top" id="jump">
      {{$user->name}}さんの投稿一覧
    </div>
    <div class="main col-md-12">
      @if(!empty($posts))
      @foreach($posts as $post)
      <a href="/menu/{{$post->id}}" class="box col-md-5 ">
      <img src="{{$post->icon_picture}}" style="width:100%; height:100%;display:block;"></img>
      <div class="title">タイトル:{{$post->name}}<br>作成日時:{{$post->created_at}}</div>
      </a>
      @endforeach
      @endif
    </div>
  </div>
  <footer>
  </footer>
  <a class="btn-to-top btn btn-primary col-sm-3 col-4" href="#jump">ページのTopへ</a>
  <a class="btn-to-back btn btn-danger col-sm-3 col-4" href="/main">戻る</a>
</body>
</html>