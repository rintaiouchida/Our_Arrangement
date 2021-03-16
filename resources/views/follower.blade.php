<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
  body{
    position:relative;
    background-color:#f0ece8;
  }

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
      width:100vw;
    }
    
    .pic{
     
      height:200px;
     

      margin-top:5px;
    }

    img{
      border-radius:1px solid black;
      display:inline-block; 
      line-height:200px; 
      height:190px; 
      width:190px; 
      border-radius:10%;
     

      border:3px solid white;
    }

    
    .name{
      height:100px;
      margin:50px 0;
      line-height:100px;
      text-align:center;
      font-size:40px;
    }

    .info{
      height:200px;
      background-color:red;
    }

    .btn_follow{
      height:40px;
      margin:80px 0;
      float:right;
    }

    .btn_back{
      height:40px;
      margin:30px 0;
      width:100px;
    }

    footer{
      position:fixed;
      height:50px;
      width:100%;
      left:0;
      bottom:0;
      z-index:0;
      background-color:#c1c0b9;
    }

    .btn-to-top{
      position:fixed;
      bottom:5px;
      left:0;
      z-index:1;
    }
    @media screen and (max-width:540px){
      .title{
        font-size:20px;
      }
      .menu2{
        height:100px;
      }
      .pic{
        height:100px;
      }
      .pic>a>img{
        width:100px;
        height:95px;
      }
      .name{
        font-size:10px;
      }

      .name{
        height:50px;
        margin:25px 0;
        font-size:20px;
        line-height:50px;
        text-align:center;
     }

        .btn_follow{
          margin:30px 0;
          font-size:10px;
          line-height:30px;
          width:100px;
      }

      .btn-to-top{
        left:40%;
      }
    }
    
  </style>
</head>
<body>
  <div id="jump"></div>
  <header>
  <div class="top col-sm-12 col-12 row">
  <a href="/main" class="btn btn-primary btn_back col-sm-2 col-2">戻る</a>
  <span class="col-sm-8 offset-sm-1 col-8 offset-1 title">フォロワーリスト</span>
  </div>
  
  </header>

  <main>
    @foreach($followers as $follower)
    <div class="menu2 row col-sm-12 col-12" >
      <div class="pic col-sm-3 col-3" ><a href="/show/{{$follower->id}}"><img src="{{$follower->picture}}" >
      </a>
      </div>
      <p class="name col-sm-6  col-6" >{{$follower->name}}</p>
      
      <div class="col-sm-3 col-3" >
      @if(Auth::user()->follow->contains($follower->id))
      <a href="/destroy_follow/{{$follower->id}}" class="btn btn-danger btn_follow">フォロー解除</a>
      @else
      <a href="/add_follow/{{$follower->id}}" class="btn btn-primary btn_follow">フォローする</a>
      @endif
      </div>
      
    </div>


    @endforeach
  </main>

  <footer>
  </footer>
  <div class="btn-to-top">
    <a class="btn btn-primary" href="#jump">ページのTopへ</a>
  </div>
  
</body>
</html>
