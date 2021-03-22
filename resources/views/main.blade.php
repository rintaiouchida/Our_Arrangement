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
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

 
  <style>
  
  
  .btn-to-top{
    position:fixed;
    bottom:5px;
    left:100px;
    z-index:1;
  }

  .btn-to-logout{
    position:fixed;
    bottom:5px;
    right:100px;
    z-index:1;
  }

  .loved i {
  color: red !important;
}

  @media screen and (max-width:540px){
    .btn-to-top{
      left:50px;
    }

    .btn-to-logout{
      right:50px;
    }
  }
  </style>
</head>
<body>
<!-- style="margin:0; position:relative;" -->
  <div class="container col-md-12">
    <div class="btn">
      <button  id="btn" class="click btn-active0">
        <span class="border1"></span>
        <span class="border2"></span>
        <span class="border3"></span>
      </button>
    </div>
    <!-- <div class="btn2">
      <a class="btn btn-primary" href="#jump">ページのTopへ</a>
    </div> -->
    <div class="top" id="jump" style="color:#89c3eb;
    text-shadow:1px 1px white; font-size:40px;">メイン画面</top>
    <div class="main col-md-12">
      @if(!empty($posts))
      @foreach($posts as $post)
      <a href="/menu/{{$post->id}}" class="box col-md-5 ">
      <img src="{{$post->icon_picture}}" style="width:100%; height:100%;display:block;"></img>
      <div class="title">タイトル:{{$post->name}}<br>作成日時:{{$post->created_at}}</div>
      </a>
      
      @endforeach
      @endif
      
      
    </div>
    <footer>
    </footer>

      <a class="btn-to-top btn btn-primary col-sm-3 col-4" style='text-shadow:none;'href="#jump">ページのTopへ</a>
      <a class="btn-to-logout btn btn-danger col-sm-3 col-4" style='text-shadow:none;' href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();" >ログアウト</a>

    
  </div>
  <div class="container2" id="container2">
    <header></header>
    <div class="myface">
      <a href="/show_auth_post"><img src="{{Auth::user()->picture}}" style="border:5px solid white; display:inline-block;width:100%;height:90%; border-radius:20%;"></a>
     
    </div>
    <div class="myinfo">
      <div class="myname">
        {{Auth::user()->name}}
      </div>
      <div class="myff">
        <div class="follow">
          <a href="/follow/{{Auth::user()->id}}" style="display:inline-block; text-decoration:none; line-height:11.5vh; color:black;">フォロー:{{$follow}}人</a> 
        </div>
        <div class="followed">
          <a href="/follower/{{Auth::user()->id}}" style="display:inline-block; text-decoration:none; line-height:11.5vh; color:black;">フォロワー:{{$follower}}人</a>
        </div>
      </div>
    </div>
    <div class="clear"></div>

    <div class="post" ><a class="info-btn" href="/post">投稿する</a></div>
    
    <div class="search"><a class="info-btn" href="/search">検索する</a></div>

    <div class="rank" ><a class="info-btn" href="/rank" >ランキング</a></div>

    <div class="delete"><a class="info-btn" href="/edit">編集する</a></div>

    <div class="mylist "><a class="info-btn" href="/show_auth_like">いいね一覧</a></div>


     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
     </form>
    </div>
  </div>

  <script>
    let $i=0;
    document.getElementById('btn').addEventListener('click',function(){
      if($i===0){
        document.getElementById('container2').classList.add('active');    
        document.getElementById('container2').classList.remove('nonactive');    
        $i=1;
      }
      else{
        document.getElementById('container2').classList.remove('active');    
        document.getElementById('container2').classList.add('nonactive');    
        $i=0;
      }
    });

   
 
  </script>

</body>
</html>



