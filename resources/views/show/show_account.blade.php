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
  }
  .icon>img{
    width:100%; 
    height:195px;
    display:inline-block; 
    border:3px solid white; 
    border-radius:10%;
  }
  .user_name{
    font-size:35px;
    text-align:center; 
    padding-top:60px;
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
    left:20%;
    z-index:1;
  }
  .btn-to-main{
    position:fixed;
    bottom:5px;
    right:20%;
    z-index:1;
  }
  .btn_unfollow{
     background-color:white;
     color:blue;
     border:1px solid black;
   }
  @media screen and (max-width:540px){
    
    .user_name{
      font-size:20px;
      margin-top:-20px;
    }
    .icon>img{
      height:110px;
      width:110px;
      margin-top:40px;
    }
    .btn_follow{
      margin-bottom:10px;
    }
  
  }
  </style>
</head>
<body>
<!-- style="margin:0; position:relative;" -->
  <div id="top">
  <div class="container col-sm-12 col-12">
    <header class="col-sm-12 col-12 row" style="height:200px;margin-bottom:100px; padding-bottom:5px; text-align:left; border-bottom:1px solid black;">

      <div id="jump" class="icon col-sm-2 col-4"><img src="{{$user->picture}}"></div>

      <div class="row col-sm-8 col-8" >
        <div class="col-sm-12 col-12 user_name" >{{$user->name}}</div>

        <div class="col-sm-12 col-12 btn_follow" style=" text-align:center;">
        @if($follow_model->follow_exist($user->id))
        @if($user->id !==Auth::id())
        <a href="" class="js-follow-toggle btn btn-primary" data-postid="{{$user->id}}">フォロー中</a>
        @endif
      
        @else
        @if($user->id !==Auth::id())
        <a href="" class="js-follow-toggle btn btn_unfollow" data-postid="{{$user->id}}">フォローする</a>
        @endif
       
        @endif
        </div>
      </div>

    </header>

    
    <!-- <div class="btn2">
      <a class="btn btn-primary" href="#jump">ページのTopへ</a>
    </div> -->
    <!-- <div class="btn_back" style="position:fixed; bottom:0; right:0;"> -->
      
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
  <footer>
  </footer>
  <a class="btn btn-danger btn-to-main" href="/main" >メイン画面へ</a>
  <a class="btn btn-primary btn-to-top" href="#top" >画面のトップへ</a>
  
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

      if($this.context.innerHTML==='フォロー中'){
        $this.context.innerHTML='フォローする';
      }
      else{
        $this.context.innerHTML='フォロー中';
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
