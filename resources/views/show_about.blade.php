<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
  .clear{
    clear:both;
  }
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


  </style>
</head>
<body>
  <!-- container(ここから) -->
  <div class="container">
    <div class="title" style="margin-bottom:50px;">
      <h1>タイトル:{{$post->name}} created by<a href="/show/{{$post->user->id}}">{{$post->user->name}}</a></h1>
    </div>

    <a href="/like_list/{{$post->id}}" style="text-align:left; display:block; text-decoration:none; margin-bottom:15px; font-size:20px;">いいね一覧</a>
    <div class="card" style="margin-bottom:100px;">
      <div class="card-header">材料</div>
      <div class="card-body" style="text-align:left;">
        <p style="float:left;">{!! nl2br($post->material) !!}</p>
        <img src="{{$post->icon_picture}}" style="float:right; height:200px; width:200px;">
        <div class="clear"></div>
      </div>
    </div>

    @foreach($steps as $step)
    <div class="card" style="margin-bottom:50px;">
      <div class="card-header">手順{{$step->step_num}}:{{$step->title}}</div>
      <div class="card-body" style="line-height:200px;">
      {{$step->about}}
      <img src="{{$step->picture}}" style="height:200px; width:200px;float:right;">
      
      <div class="clear"></div>
      </div>
    </div>
    @endforeach

    @if(Auth::user()->like->contains($post->id))
      <a href="/dislike/{{$post->id}}"class="btn btn-primary">参考になった👍</a>
    @else
      <a href="/like/{{$post->id}}" class="btn" style="background-color:white; color:black; border:1px solid black;">参考になった👍</a>
    @endif

  </div>
  <!-- container(ここまで) -->
</body>
</html>
