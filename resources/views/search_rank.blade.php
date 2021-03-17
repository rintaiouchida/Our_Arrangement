<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
  .genre-rank{
    /* position:fixed; */
    /* top:0; */
    /* left:0; */
    /* width:100%; */
    /* border-bottom:5px solid red; */
    text-align:center;
    margin-bottom:50px;
  }
  .genre-rank>h1{
    color:#89c3eb;
    text-shadow:3px 3px white;
  }
  .age-rank{
    /* position:fixed; */
    /* top:50%; */
    /* left:0; */
    /* width:100%; */
    /* border-bottom:5px solid red; */
    text-align:center;
  }
  .age-rank>h1{
    color:#89c3eb;
    text-shadow:3px 3px white;
  }

  .btn-rank{
    margin-bottom:10px;
  }

  .btn-rank>a{
    display:block; 
    padding:10px 0; 
    border-radius:10px; 
    text-decoration:none;
  }
  </style>
</head>
<body style="background-color:#e2dbc6;" >
  <div class="genre-rank">
    <h1>ジャンル別ランキング</h1>
    <div class="row col-sm-12 col-12">
      <div class="btn-rank col-sm-3   col-10 offset-1"><a class="btn-primary" href="/search_rank_genre/1">ご飯もの</a></div>
      <div class="btn-rank col-sm-3  col-10 offset-1"><a class="btn-primary" href="/search_rank_genre/2">麺類</a></div>
      <div class="btn-rank col-sm-3  col-10 offset-1"><a class="btn-primary" href="/search_rank_genre/3">揚げ物</a></div>
      <div class="btn-rank col-sm-3  col-10 offset-1"><a class="btn-primary" href="/search_rank_genre/4">スープ</a></div>
      <div class="btn-rank col-sm-3  col-10 offset-1"><a class="btn-primary" href="/search_rank_genre/5">デザート</a></div>
    </div>
  </div>
  <div class="age-rank">
    <h1>年齢別ランキング</h1>
    <div class="row col-sm-12 col-12">
      <div class="btn-rank col-sm-3   col-10 offset-1"><a class="btn-primary" href="/search_rank_age/1">10代</a></div>
      <div class="btn-rank col-sm-3  col-10 offset-1"><a class="btn-primary" href="/search_rank_age/2">20代</a></div>
      <div class="btn-rank col-sm-3  col-10 offset-1"><a class="btn-primary" href="/search_rank_age/3">30代</a></div>
      <div class="btn-rank col-sm-3  col-10 offset-1"><a class="btn-primary" href="/search_rank_age/4">40代</a></div>
      <div class="btn-rank col-sm-3  col-10 offset-1"><a class="btn-primary" href="/search_rank_age/5">50代</a></div>
      <div class="btn-rank col-sm-3  col-10 offset-1"><a class="btn-primary" href="/search_rank_age/6">60代以上</a></div>
    </div>
  </div>
  </div>
    <!-- <a class="btn btn-primary col-sm-6 offset-sm-3 col-6 offset-3" href="/search_rank_genre">ジャンル別<br>ランキング<br>はこちら</a>
    <a class="btn btn-primary col-sm-6 offset-sm-3 col-6 offset-3" href="/search_rank_age">年齢別<br>ランキング<br>はこちら</a> -->

</body>
</html>