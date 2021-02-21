
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <style>
    .menu{
      height:200px;
      background-color:yellow;
      margin-bottom:20px;
    }
    .name{
      height:100px;
      float:left;
      width:80%;
      margin:auto auto;
      background-color:blue;
    }
  </style>
</head>
<body>
  @foreach($followers as $follower)
  <div class="menu">
  
    <a href="/main/{{$follower->id}}"><img src="{{$follower->picture}}" style="display:inline-block; line-height:200px; height:190px; width:190px; border-radius:10%; float:left"></a>{{$follower->name}}id:{{$follower->id}}
    @if(Auth::user()->follow->contains($follower->id))
    <a href="/destroy_follow/{{$follower->id}}" class="btn btn-danger">フォロー解除</a>
    @else
    <a href="/add_follow/{{$follower->id}}" class="btn btn-primary">フォローする</a>
    @endif

  </div>
  @endforeach
  <div><a href="/main" class="btn btn-primary">戻る</a></div>
</body>
</html>