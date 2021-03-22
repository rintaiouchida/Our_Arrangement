<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Document</title>
  <style>
    body{
     padding:0rem;
    }
    .container{
      padding:0;
      margin:0rem auto;
      background-color:#e2dbc6;
      text-align:center;
      width:100vw;
      height:100vh;
    }

    .title{
      padding-top:100px;
      margin-bottom:100px;
    }
  </style>
</head>
<body>
  <div class="container col-md-12">
    <div class="title">
      <h1 style="color:#89c3eb;
    text-shadow:1px 1px white; font-size:40px;">検索画面</h1>
    </div>

    <form method ="GET" action="/show_search" enctype="multipart/form-data">
    <div class="form-group row">
      <div class="col-md-8 offset-md-2">
        <input  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="関連するワードを入力してください。">
  
         @error('name')
         <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
        </span>
         @enderror
      </div>
     </div>

     <div class="form-group row mb-0" style="margin-top:50px;">
      <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-primary col-md-3">
        {{ __('検索') }}
        </button>
        <a class="btn btn-danger col-md-3 offset-md-3" href="/main">戻る</a>
      </div>
     </div>

     </form>

  </div>

  
</body>
</html>