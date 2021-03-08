<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
<div class="container col-md-12">
    <div class="btn">
      <a class="btn btn-danger col-md-1" href="/main" style="position:fixed; top:0; left:0; ">戻る</a>
    </div>
    <div class="btn2">
      <a class="btn btn-primary" href="#jump">ページのTopへ</a>
    </div>
    <div class="top" id="jump">「{{$search}}」に関する検索結果が{{$count}}件見つかりました。</top>
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
</body>
</html>