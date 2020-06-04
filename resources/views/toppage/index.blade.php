@extends('layouts.app')

@section('content')

{{--成功時のメッセージ--}}
@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

    <div class="TopPageMain__title">
      新規投稿一覧
    </div>{{-- .TopPageMain__title --}}
    <ul class="TopPageMain__box">
      @foreach($posts as $post)
        <div class="TopPageMain__box__card col-sm-3 my-1 card img-thumbnail">

          <div class="TopPageMain__box__card--title">
            {{$post->title}}
          </div>{{-- .TopPageMain__box__card--title --}}

          <img  src="{{ asset('storage/' . $post->image) }}" class="TopPageMain__box__card--image rounded mx-auto d-block" alt="投稿画像">
          
          <div class="my-2">
            投稿者 : {{ mb_strimwidth($post->user->name, 0, 15, '...') }}

          </div>

          <div class="TopPageMain__box__card--comment card-body text-left">
            {{ mb_strimwidth($post->comment, 0, 40, '...') }}
          </div>{{-- .TopPageMain__box__card--comment --}}
          
        </div>{{-- .TopPageMain__box__card --}}
      @endforeach
    </ul>{{-- .TopPageMain__box --}}
@endsection