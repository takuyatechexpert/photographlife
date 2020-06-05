@extends('layouts.app')

@section('content')

{{--成功時のメッセージ--}}
@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

  <form method="GET" action="{{ route('toppage.index')}}" class="form-inline my-2 my-lg-0">
    @csrf
  <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
  <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="検索する">
  </form>

    <div class="TopPageMain__title pt-2 px-0">
      新規投稿一覧
    </div>{{-- .TopPageMain__title --}}
    <div class="TopPageMain__box col-sm-12">
      @foreach($posts as $post)
      <a href="{{route('post.show', ['id'=> $post->id])}}" class="TopPageMain__box--link btn btn-default">
        <div class="TopPageMain__box__card col-sm-6 my-1 card img-thumbnail">

          <div class="TopPageMain__box__card--title h4">
            {{ mb_strimwidth($post->title, 0, 21, '...') }}
          </div>{{-- .TopPageMain__box__card--title --}}
          
          <img  src="{{ asset('storage/' . $post->image) }}" class="TopPageMain__box__card--image rounded mx-auto d-block" alt="投稿画像">

          <div class="my-2 text-right">
            投稿者 : {{ mb_strimwidth($post->name, 0, 15, '...') }}
          </div>
          
          <div class="TopPageMain__box__card--comment card-body text-left">
            {{ mb_strimwidth($post->comment, 0, 40, '...') }}
          </div>{{-- .TopPageMain__box__card--comment --}}

        </div>{{-- .TopPageMain__box__card --}}
      </a>
@endforeach
    </div>{{-- .TopPageMain__box --}}
@endsection