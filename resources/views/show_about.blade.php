<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
    <!-- ajax実験 -->
    @if($like_model->like_exist(Auth::user()->id,$post->id))
      <p class="favorite-marke">
        <a class="js-like-toggle  btn btn-primary" href="" data-postid="{{ $post->id }}">参考になった👍</a>
        <span class="likesCount">{{$post->like_count}}</span>
      </p>
      @else
      <p class="favorite-marke">
        <a class="js-like-toggle btn normal" href="" data-postid="{{ $post->id }}">参考になった👍</a>
        <span class="likesCount">{{$post->like_count}}</span>
      </p>
      @endif​
      <!-- ajax実験(ここまで) -->



  </div>
  <!-- container(ここまで) -->

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
      console.log(data);
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
