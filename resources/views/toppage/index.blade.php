@extends('layouts.app')

@section('content')

{{--成功時のメッセージ--}}
@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

    <div class="TopPageMain__title">
      新規投稿一覧
    </div>{{-- .TopPageMain__title --}}

    <div class="TopPageMain__box col-sm-4 my-1 card img-thumbnail">

      <div class="TopPageMain__box--title">
        ここにタイトルが入る
      </div>{{-- .TopPageMain__box--title --}}

      <img src="#" class="TopPageMain__box--image mx-auto">
        ここには画像が入る
      </img>{{-- .TopPageMain__box--image --}}

      <div class="TopPageMain__box--comment">
        ここにコメントが入る
      </div>{{-- .TopPageMain__box--comment --}}
      
    </div>{{-- .TopPageMain__box --}}

    <div class="TopPageMain__box col-sm-4 my-1 card img-thumbnail">

      <div class="TopPageMain__box--title">
        ここにタイトルが入る
      </div>{{-- .TopPageMain__box--title --}}

      <img src="#" class="TopPageMain__box--image mx-auto">
        ここには画像が入る
      </img>{{-- .TopPageMain__box--image --}}

      <div class="TopPageMain__box--comment">
        ここにコメントが入る
      </div>{{-- .TopPageMain__box--comment --}}
      
    </div>{{-- .TopPageMain__box --}}

    <div class="TopPageMain__box col-sm-4 my-1 card img-thumbnail">

      <div class="TopPageMain__box--title">
        ここにタイトルが入る
      </div>{{-- .TopPageMain__box--title --}}

      <img src="#" class="TopPageMain__box--image mx-auto">
        ここには画像が入る
      </img>{{-- .TopPageMain__box--image --}}

      <div class="TopPageMain__box--comment">
        ここにコメントが入る
      </div>{{-- .TopPageMain__box--comment --}}
      
    </div>{{-- .TopPageMain__box --}}

  @endsection