
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .menu{
      height:200px;
      background-color:yellow;
      margin-bottom:20px;
    }
    .name{
      height:100px;
      float:left;
      width:80%;
      margin:auto auto;
      background-color:blue;
    }
  </style>
</head>
<body>
  @foreach($follow_users as $follow_user)
  <div class="menu">
    <!-- {{$follow_user['name']}}<br>
    {{$follow_user['email']}}<br>
    {{$follow_user['birthday']}}<br>
    {{$follow_user['picture']}}<br> -->

    <a href="/main/{{$follow_user['id']}}"><img src="{{$follow_user['picture']}}" style="display:inline-block; line-height:200px; height:190px; width:190px; border-radius:10%; float:left"></a>
    
  </div>
  @endforeach
</body>
</html>