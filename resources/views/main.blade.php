<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    
    .container{
      background-color:yellow;
      text-align:center;
      height:100vh;
      position:relative;
    }

    .btn{
      position:fixed;
      top:0;
      left:0;
    }
    .btn > span{
      background-color:black;
      width:30px;
      height:5px;
      display:block;
      margin-bottom:5px;
    }

    .icon{
      width:200px;
      height:200px;
      border-radius:10%;
    }
    .ff{
      /* background-color:blue; */
      width:60%;
      margin:0 auto;
      margin-top:50px;
    }
    .follower{
      float:left;
    }
    .follow{
      float:right;
    }
    .clear{
      clear:both;
    }

    .border{
      border-bottom:1px solid black;
    }

    .red{
      background-color:red;
    }
    

    
  </style>
</head>
<body>
  <div class="container">
    <button class="btn" id="btn">
      <span></span>
      <span></span>
      <span></span>
    </button>
    
    <img class="icon" src="{{Auth::user()->picture}}" >
    <div>{{AUTH::user()->name}}</div>
    <div class="ff">
      <div class="follower">
      55follower
      </div>
      <div class="follow">
      55follow
      </div>
      <div class="clear"></div>
    </div>
    <div class="border"></div>

    以下にフォローしている人の投稿を掲載
  </div>
  <div class="container2">
  </div>

  <script>
  </script>
</body>
</html>
