@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <h2 class="card-header" style="background-color:yellow; text-align:center; width:100%;">※{{$confirm->name}}さんのアカウントを削除しました</h2>

                  <a class="btn btn-primary"  href="/home" style="display:inline-block; margin:200px;">戻る</a>
         
                  
               


            </div>



            
        </div>
    </div>
</div>
@endsection
