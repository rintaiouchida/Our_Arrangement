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
<!-- style="margin:0; position:relative;" -->
  <div class="container col-md-12">
    <header class="col-md-12" style="height:200px;margin-bottom:100px; padding-bottom:5px; text-align:left; border-bottom:1px solid black;">
      <a id="jump"><img src="{{$user->picture}}" style="width:200px; height:195px;display:inline-block; border:3px solid white; border-radius:10%;"></a>
      <span class="offset-md-3" style="font-size:35px;">{{$user->name}}</span>
      @if(Auth::user()->follow->contains($user->id))
      <a href="/destroy_follow/{{$user->id}}" class="btn btn-primary offset-md-2 btn_follow">フォロー中</a>
      @else
      <a href="/add_follow/{{$user->id}}" class="btn  offset-md-2 btn_follow" style="color:blue; background-color:white; border:1px solid black;">フォローする</a>
      @endif
    </header>

    </header>
    <div class="btn2">
      <a class="btn btn-primary" href="#jump">ページのTopへ</a>
    </div>
    <!-- <div class="btn_back" style="position:fixed; bottom:0; right:0;"> -->
      <a class="btn btn-primary" href="/main" >メインへ</a>
    <!-- </div> -->
  
    <div class="main col-md-12">
      @if(!empty($user->post))
      @foreach($user->post as $post)
      <a href="/menu/{{$post->id}}" class="box col-md-5 ">
      <img src="{{$post->icon_picture}}" style="width:100%; height:100%;display:block;"></img>
      <div class="title">タイトル:{{$post->name}}<br>作成日時:{{$post->created_at}}</div>
      
      </a>
      @endforeach
      @endif
      
    
    </div>
    
    
  </div>
  </div>
</body>
</html>
