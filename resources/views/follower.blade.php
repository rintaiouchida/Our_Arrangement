<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <style>
  

  header{
    position:relative;
    width:100%;
    height:100px;
    margin-bottom:20px;
  }
  .top{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    background-color:#e2dbc6;
    z-index:1;
  }

  .title{
    font-size:30px;
    color:#2792c3;
    font-weight:bold;
    text-shadow:2px 2px white;
    letter-spacing:5px;
    line-height:100px;
  }

 
    .menu2{
      height:200px;
      background-color:#e2dbc6;
      margin-bottom:20px;
      background-color:#c1e4e9;
    }
    
    .pic{
      /* background-color:pink; */
      height:200px;
      float:left;
      margin-top:5px;
    }

    img{
      border-radius:1px solid black;
    }

    
    .name{
      height:100px;
      float:left;
      margin:50px 0;
      /* background-color:red; */
      line-height:100px;
      text-align:center;
    }

    .info{
      height:200px;
      background-color:red;
    }

    .btn_follow{
      float:right;
      display:inline-block;
      height:40px;
      margin:80px 0;
    }

    .btn_back{
      height:40px;
      margin:30px 0;
      width:100px;
    }

    footer{
      height:1000px;
      width:100%;
      background-color:white;
    }
    
  </style>
</head>
<body>
  <header>
  <div class="top col-md-12">
  <a href="/main" class="btn btn-primary btn_back">戻る</a>
  <span class="col-md-4 offset-2 title">フォロワーリスト</span>
  </div>
  </header>

  <main>
    @foreach($followers as $follower)
    <div class="menu2 col-md-12">
      <div class="pic col-md-2"><a href="/show/{{$follower->id}}"><img src="{{$follower->picture}}" style="display:inline-block; line-height:200px; height:190px; width:190px; border-radius:10%; float:left; border:3px solid white;"></a></div>
      <h1 class="name col-md-6 ">{{$follower->name}}</h1>
      
      @if(Auth::user()->follow->contains($follower->id))
      <a href="/destroy_follow/{{$follower->id}}" class="btn btn-danger btn_follow">フォロー解除</a>
      @else
      <a href="/add_follow/{{$follower->id}}" class="btn btn-primary btn_follow">フォローする</a>
      @endif
      
    </div>

    @endforeach
  </main>

  <footer></footer>
  
</body>
</html>


