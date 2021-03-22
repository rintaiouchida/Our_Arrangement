@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <h2 class="card-header" style="background-color:yellow; text-align:center; width:100%;">※{{$contact->name}}さんのアカウントを変更しました</h2>

                  <a class="btn btn-primary"  href="/main" style="display:inline-block; margin:200px;width:100px;">戻る</a>
         
                  
               


            </div>



            
        </div>
    </div>
</div>
@endsection
