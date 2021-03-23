<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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

  .head-title{
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
    .btn_unfollow{
     background-color:white;
     color:blue;
     border:1px solid black;
   }
    
    @media screen and (max-width:540px){
      .head-title{
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
        left:50px;
      }
      .btn-to-back{
        right:50px;
      }
    }
    
  </style>
</head>
<body style="position:relative;">
  <div id="jump"></div>
  <header>
    <div class="top" style="text-align:center;">
      <span class=" head-title" >フォローリスト</span>
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
      @if($follow_model->follow_exist($follow->id))
      <a href="" class="js-follow-toggle btn btn-primary btn_follow" data-postid="{{$follow->id}}">フォロー中</a>
      @else
      <a href="" class="js-follow-toggle btn btn_unfollow btn_follow" data-postid="{{$follow->id}}">フォローする</a>
      @endif
      </div>
      
    </div>


    @endforeach
  </main>

  <footer>
  </footer>
    <a class="btn-to-top btn btn-primary col-sm-3 col-4" href="#jump">ページのTopへ</a>
    <a class="btn-to-back btn btn-danger col-sm-3 col-4" href="/main">メイン画面へ</a>

    <script>
      // ajax通信
  $(function(){
  var like=$('.js-follow-toggle');
  var likePostId;

  like.on('click',function(){
    var $this=$(this);
    likePostId=$this.data('postid');

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
    $.ajax({
      url:'/ajaxfollow',
      type:'POST',
      data:{
        'post_id':likePostId,
      },
    })

    .done(function(data){

      if($this.context.innerHTML==='フォローする'){
        $this.context.innerHTML='フォロー中';
      }
      else{
        $this.context.innerHTML='フォローする';
      }
      $this.toggleClass('btn-primary');
      $this.toggleClass('btn_unfollow');
    })
    .fail(function (data, xhr, err){
      //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
      //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
      console.log(likePostId);
      console.log(data);
      console.log(err);
      console.log(xhr);
    });
    return false;
  });
});
  // ajax通信(ここまで)
    </script>
</body>
</html>

