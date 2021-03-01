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
    <div class="title">
      <h1>タイトル:{{$post->name}}</h1>
    </div>

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
  </div>
  <!-- container(ここまで) -->
</body>
</html>
