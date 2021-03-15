<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
<!-- style="margin:0; position:relative;" -->
  <div class="container col-md-12">
    <div class="btn">
      <button  id="btn">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
    <div class="btn2">
      <a class="btn btn-primary" href="#jump">ページのTopへ</a>
    </div>
    <div class="top" id="jump">メイン画面</top>
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
    
    
  </div>
  <div class="container2" id="container2">
    <header></header>
    <div class="myface">
      <img src="{{Auth::user()->picture}}" style="border:5px solid white; display:inline-block;width:100%;height:90%; border-radius:20%;">
     
    </div>
    <div class="myinfo">
      <div class="myname">
        {{Auth::user()->name}}
      </div>
      <div class="myff">
        <div class="follow">
          <a href="/follow/{{Auth::user()->id}}" style="display:inline-block; text-decoration:none; line-height:11.5vh; color:black;">フォロー:{{$follow}}</a> 
        </div>
        <div class="followed">
          <a href="/follower/{{Auth::user()->id}}" style="display:inline-block; text-decoration:none; line-height:11.5vh; color:black;">フォロワー:{{$follower}}</a>
        </div>
      </div>
    </div>
    <div class="clear"></div>

    <div class="post" ><a class="info-btn" href="/post">投稿する</a></div>
    
    <div class="search"><a class="info-btn" href="/search">検索する</a></div>

    <div class="rank" ><a class="info-btn" href="/rank" >ランキング</a></div>

    <div class="delete"><a class="info-btn" href="/destroy">削除</a></div>

    <div class="logout">
      <a class="info-btn" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" >ログアウト
      </a></div>

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
