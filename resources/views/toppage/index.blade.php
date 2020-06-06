@extends('layouts.app')

@section('content')

{{--成功時のメッセージ--}}
@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

  <form method="GET" action="{{ route('toppage.index')}}" class="form-inline mx-auto col-sm-10">
    @csrf
    <input class="form-control col-sm-9" type="text" name="search" placeholder="Search" aria-label="Search">
    <input type="submit" class="btn btn-outline-secondary my-2 mx-auto col-sm-2" value="検索する">
  </form>

    <div class="TopPageMain__title pt-2 px-0">
      新規投稿一覧
    </div>{{-- .TopPageMain__title --}}
    <div class="postBox col-sm-12 d-flex flex-wrap">
      @foreach($posts as $post)
      <a href="{{route('post.show', ['id'=> $post->id])}}" class="postBox--link btn btn-default">
        <div class="postBox__card col-sm-6 my-1 card img-thumbnail">

          <div class="postBox__card--title h4">
            {{ mb_strimwidth($post->title, 0, 21, '...') }}
          </div>{{-- .postBox__card--title --}}
          
          <img  src="{{ asset('storage/' . $post->image) }}" class="postBox__card--image rounded mx-auto d-block" alt="投稿画像">

          <div class="my-2 text-right">
            投稿者 : {{ mb_strimwidth($post->name, 0, 15, '...') }}
          </div>
          
          <div class="postBox__card--comment card-body text-left">
            {{ mb_strimwidth($post->comment, 0, 40, '...') }}
          </div>{{-- .postBox__card--comment --}}

        </div>{{-- .postBox__card --}}
      </a>
@endforeach
    </div>{{-- .postBox --}}
@endsection