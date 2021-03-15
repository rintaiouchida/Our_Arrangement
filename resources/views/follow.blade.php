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
      height:1000px;
      width:100%;
      background-color:white;
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
      }
    }
    
  </style>
</head>
<body>
  <header>
  <div class="top col-md-12 col-sm-12 col-xs-12">
  <a href="/main" class="btn btn-primary btn_back">戻る</a>
  <span class="col-md-4 offset-2 title">フォローリスト</span>
  </div>
  
  </header>

  <main>
    @foreach($follows as $follow)
    <div class="menu2 row col-sm-12 col-12" >
      <div class="pic col-sm-3 col-3" ><a href="/show/{{$follow->id}}"><img src="{{$follow->picture}}" >
      </a>
      </div>
      <p class="name col-sm-6  col-6" >{{$follow->name}}</p>
      
      <div class="col-sm-3 col-3" >
      @if(Auth::user()->follow->contains($follow->id))
      <a href="/destroy_follow/{{$follow->id}}" class="btn btn-danger btn_follow">フォロー解除</a>
      @else
      <a href="/add_follow/{{$follow->id}}" class="btn btn-primary btn_follow">フォローする</a>
      @endif
      </div>
      
    </div>


    @endforeach
  </main>

  <footer>
</footer>
  
</body>
</html>