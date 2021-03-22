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
<div class="container col-sm-12 col-12 row" style="position:relative;">
    


    <div class="top" id="jump" style="padding-top:100px;color:#89c3eb;
    text-shadow:1px 1px white; font-size:30px;">「{{$search}}」に関する検索結果が<br>{{$count}}件見つかりました。</top>
    <div class="main col-md-12">
      @if(!empty($contacts))
      @foreach($contacts as $contact)
      <a href="menu/{{$contact->id}}" class="box col-md-5 " style="position:relative;">
      <img src="{{$contact->icon_picture}}" style="width:100%; height:100%;display:block;">
      
      
      <div class="title">タイトル:{{$contact->name}}<br>作成日時:{{$contact->created_at}}</div>
      </a>
      @endforeach
      @endif
    </div>
  </div>
  <footer>
  </footer>
  <a class="btn-to-top btn btn-primary col-sm-3 col-4" href="#jump">ページのTopへ</a>
  <a class="btn-to-back btn btn-danger col-sm-3 col-4" href="/main" >戻る</a>
</body>
</html>