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

  .normal{
    background-color:white; 
    color:black; 
    border:1px solid black;
  }

  .loved{
    background-color:blue; 
    color:white; 
    border:1px solid black;
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



  @media screen and (max-width:540px){
    .head-title>h1{
      font-size:25px;
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
  <!-- container(ここから) -->
  <div class=" container">
    <div class="head-title row" style="background-color:yellow">
      <div id="jump"></div>
      <h1 class="col-sm-12 col-12">タイトル:「{{$post->name}}」</h1>
     <h1 class="col-sm-12 col-12">created by<a href="/show/{{$post->user->id}}">{{$post->user->name}}</a></h1>
    </div>

    <a href="/like_list/{{$post->id}}" style="text-align:left; display:block; text-decoration:none; margin-bottom:15px; font-size:20px;">いいね一覧</a>
    <div class="card" style="margin-bottom:100px;">
      <div class="card-header">材料</div>
      <div class="card-body row col-sm-12 col-12">
        <p class="col-sm-9 col-8" style="text-align:left;">{!! nl2br($post->material) !!}</p>
        <img class="col-sm-3 col-4" src="{{$post->icon_picture}}">
      </div>
    </div>

    @foreach($steps as $step)
    <div class="card" style="margin-bottom:50px;">

      <div class="card-header">手順{{$step->step_num}}:{{$step->title}}</div>

        <div class="card-body row">
          <p class="col-sm-9 col-8" style="text-align:left;">{{$step->about}}</p>
          <img  class="col-sm-3 col-4"  src="{{$step->picture}}">
        </div>
    </div>
    @endforeach
    <!-- ajax実験 -->
    @if($like_model->like_exist(Auth::user()->id,$post->id))
      <p class="favorite-marke" style="margin-bottom:50px;">
        <a class="js-like-toggle  btn btn-primary" href="" data-postid="{{ $post->id }}">いいね👍</a>
        <span class="likesCount">{{$post->like_count}}</span>
      </p>
      @else
      <p class="favorite-marke" style="margin-bottom:50px;">
        <a class="js-like-toggle btn normal" href="" data-postid="{{ $post->id }}">いいねを押す</a>
        <span class="likesCount">{{$post->like_count}}</span>
      </p>
      @endif​
      <!-- ajax実験(ここまで) -->
  </div>
  <!-- container(ここまで) -->
  <footer>
  </footer>
  <a class="btn-to-top btn btn-primary col-sm-4 col-4" href="#jump">ページのTopへ</a>
  <a class="btn-to-back btn btn-danger col-sm-4 col-4" href="/main">戻る</a>


  <script>
  // ajax通信
  $(function(){
  var like=$('.js-like-toggle');
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
      url:'/ajaxlike',
      type:'POST',
      data:{
        'post_id':likePostId
      },
    })

    .done(function(data){

      if($this.context.innerHTML==='いいねを押す'){
        $this.context.innerHTML='いいね👍';
      }
      else{
        $this.context.innerHTML='いいねを押す';
      }
      $this.toggleClass('btn-primary');
      $this.toggleClass('normal');
    })
    .fail(function (data, xhr, err) {
      //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
      //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
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
