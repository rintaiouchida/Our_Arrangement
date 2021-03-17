@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('投稿画面') }}</div>

                <div class="card-body">
                    <form method="POST" action="/store" enctype="multipart/form-data">
                        @csrf
                        <!-- タイトル設定 -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('タイトル') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder='(例)○○を用いた激辛カレー' autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- タイトル設定(ここまで) -->

                        <!-- アイコン設定 -->
                        <div class="form-group row">
                            <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('アイコン') }}</label>

                            <div class="col-md-6">
                                <input id="picture" type="file" class="form-control-file @error('picture') is-invalid @enderror" name="picture" value="{{ old('picture') }}"  autocomplete="picture" accept=".png, .jpg, .jpeg, .pdf, .doc">
                                @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- アイコン設定(ここまで) -->

                        <!-- 材料 -->
                        <div class="form-group row">
                                <span class="col-sm-3 col-3"></span>
                                <span class="btn btn-primary col-sm-3 col-3" id="btn_plus">行を追加</span>
                                <span class="btn btn-danger col-sm-3  col-3" id="btn_minus">行を削除</span>
                                <span class="col-sm-3 col-3"></span>
                        
                            <label for="material" class="col-md-4 col-form-label text-md-right" style="margin-top:10px;">{{ __('材料') }}</label>

                            <div class="col-md-6 material-group" style="margin-top:10px;">
                                <input id="material"  class="form-control @error('material') is-invalid @enderror" name="material0" value="{{ old('material') }}" placeholder='(例)塩大さじ3杯' required autocomplete="material" autofocus>

                                <!-- @error('material')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>
                        <!-- 材料(ここまで) -->

                        <!-- アレンジ元設定 -->
                        <div class="form-group row">
                            <label for="arrange_origin" class="col-md-4 col-form-label text-md-right">{{ __('アレンジ元') }}</label>

                            <div class="col-md-6">
                                <input id="arrange_origin" type="text" class="form-control @error('arrange_origin') is-invalid @enderror" name="arrange_origin" value="{{ old('arrange_origin') }}" required autocomplete="arrange_origin" placeholder='(例)赤いきつね' autofocus>

                                @error('arrange_origin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- アレンジ元設定(ここまで) -->

                        <!-- ジャンル設定 -->
                        <div class="form-group row">
                            <label for="selectA" class="col-md-4 col-form-label text-md-right">{{ __('ジャンル') }}</label>
                            <div class="col-md-6">
                                <select id="selectA" class="form-control"  name="genre" >
                                    <option >選択してください</option>
                                    <option  value="1">ご飯もの</option>
                                    <option value="2">麺類</option>
                                    <option  value="3">揚げ物</option>
                                    <option  value="4">スープ</option>
                                    <option  value="5">デザート</option>
                                </select>
                                    @error('selectA')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                           
                        </div>
                        <!-- ジャンル設定(ここまで) -->
               
                        


                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary col-md-3">
                                    {{ __('登録') }}
                                </button>
                                <a class="btn btn-danger col-md-3 offset-md-3" href="/main">戻る</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let $i=1;
    $(function(){
        $('#btn_plus').click(function(){
            // $('#material').attr('placeholder',);

            $('.material-group').append('<input id="add_material"  class="form-control @error('material') is-invalid @enderror" name="add_material" value="{{ old('material') }}" required autocomplete="material" autofocus>');

            $('#add_material').attr('id',`material${$i}`);
            // $(`#material${$i}`).attr('placeholder',`material${$i}`);
            $(`#material${$i}`).attr('name',`material${$i}`);
            $i++;
        });

        $('#btn_minus').click(function(){
            if($i>1){
                $i--;
                $(`#material${$i}`).remove();
            }
        });
    });
</script>
@endsection
