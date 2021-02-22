<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    
    .container{
      margin:0;
      background-color:#e2dbc6;
      text-align:center;
      height:1000px;
      width:100vw;
      position:relative;
      
    }

    .btn{
      position:fixed;
      top:0;
      left:0;
      z-index:1;
    }
    .btn > span{
      background-color:black;
      width:30px;
      height:5px;
      display:block;
      margin-bottom:5px;
    }

    .clear{
      clear:both;
    }

   /* メイン画面②の設計 */
    .container2{
      background-color:#f0ece8;
      
      height:100vh;
      width:60vw;
      position:fixed;
      top:0;
      left:-60vw;
      
    }
    header{
      height:7%;
    }

    .myface{
      height:23%;
      /* background-color:red; */
      width:20%;
      float:left;
    }
    .myinfo{
      width:80%;
      height:23%;
      float:left;
    }
    .myname{
      /* background-color:blue; */
      width:100%;
      height:50%;
      text-align:center;
      line-height:11.5vh;
      font-size:40px;
    }
    .myff{
       /* background-color:red; / */
      width:85%;
      height:50%;
      float:right;
    }
    .follow{
      /* background-color:red; */
      float:left;
      width:50%;
      height:100%;
      text-align:center;
      font-size:25px;
    }
    .follow >a:hover{
      color:pink;
    }
    .followed{
      /* background-color:red; */
      float:left;
      width:50%;
      height:100%;
      text-align:center;
      font-size:25px;
    }

    .post{
      height:14%;
    }
    .post:active{
      color:red;
    }
    .search{
      height:14%;
      
    }
    .rank{
      height:14%;
      
    }
    .delete{
      height:14%;
      
    }
    .logout{
      height:14%;
    }

    /* ここまで */

    /* メイン画面②のボタンの要素 */
    .info-btn{
      display:block;
      text-decoration:none; 
      line-height:14vh;
      background-color:#f0ece8;
      border-top:5px solid #89c3eb;
      color:#89c3eb;
      text-shadow:3px 3px white;
    }
    .info-btn:hover{
      background-color:white;
    }
    .info-btn:active{
      color:red;
    }
    

    /* メイン画面②がスライドしてくる */
    .active{
      transform:translateX(60vw);
      transition:1s;
    }
    .nonactive{
      transform:translateX(0);
      transition:1s;
    }
    
  </style>
</head>
<body style="margin:0; position:relative;">
  <div class="container">
    <button class="btn" id="btn">
      <span></span>
      <span></span>
      <span></span>
    </button>
    
    

    以下にフォローしている人の投稿を掲載
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

    <div class="post" style="text-align:center; font-size:60px;"><a class="info-btn" href="/post">投稿する</a></div>
    
    <div class="search" style="text-align:center; font-size:60px;"><a class="info-btn" href="#">検索する</a></div>

    <div class="rank" style="text-align:center; font-size:60px;"><a class="info-btn" href="#" >ランキング</a></div>

    <div class="delete" style="text-align:center; font-size:60px;"><a class="info-btn" href="/destroy">削除</a></div>

    <div class="logout" style="text-align:center; font-size:60px;">
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
