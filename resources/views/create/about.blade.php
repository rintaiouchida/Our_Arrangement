@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header col-md-12">手順{{$step_num}}を記入<a class="btn btn-primary col-md-2 offset-md-9" href="/">Topに戻る</a></div>

                <div class="card-body">
                    <form method="POST" action="/store_about" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}">
                        <input type="hidden" name="step_num" value="{{$step_num}}">
                        <!-- タイトル設定 -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{__('手順')}}</label>
                            
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                            <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('写真') }}</label>

                            <div class="col-md-6">
                                <input id="picture" type="file" class="form-control-file @error('picture') is-invalid @enderror" name="picture" value="{{ old('picture') }}"  autocomplete="picture" accept=".png, .jpg, .jpeg, .pdf, .doc">
                                @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- アイコン設定(ここまで) -->

                        <!-- 材料 -->
                        <div class="form-group row">
                            <label for="about" class="col-md-4 col-form-label text-md-right">{{ __('詳細') }}</label>

                            <div class="col-md-6">
                                <textarea id="about"  class="form-control @error('about') is-invalid @enderror" name="about" value="{{ old('about') }}" required autocomplete="about" autofocus></textarea>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- 材料(ここまで) -->

                      


                         <div class="form-group row mb-0" style="margin-top:50px;">
                            <div class="col-md-12">
                                <button type="submit"  name="next" class="btn btn-primary col-md-3 offset-md-2">
                                
                                    {{ __('次のステップへ') }}
                                </button>
                                <!-- テスト -->
                                <button type="submit"  name="end" class="btn btn-danger col-md-2 offset-md-3">
                                
                                    {{ __('登録') }}
                                </button>
                                <!-- テスト(ここまで) -->
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
