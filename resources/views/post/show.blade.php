@extends('layouts.app')

@section('content')
  
<div class="postShowMain">
  <ul class="postShowMain--title h1 pt-3 col-sm-6 mx-auto d-flex justify-content-between align-items-center">
    <li>
    {{ $post->title}}
    </li>
    <li>
      @guest

      @else
        @if(Auth::user()->id === $post->user_id)
        <form method="post" action="{{route('post.destroy', ['id'=> $post->id])}}">
          @csrf
          <input type="submit" value="削除" class="btn btn-outline-danger py-2 px-4">
        </form>
        @endif
      @endguest
    </li>
  </ul>

  <div class="postShowMain--image">
    <img  src="{{ asset('storage/' . $post->image) }}" class="postShowMain--image--size col-sm-6 p-0" alt="投稿画像">
  </div>
  
  <div class="mt-3 h3 text-right col-sm-6 mx-auto">
    投稿者 : {{ mb_strimwidth($post->user->name, 0, 15, '...') }}
  </div>

  <div class="text-left col-sm-6 mx-auto h3">使用機材詳細</div>
  <div class="postShowMain--comment col-sm-6 mx-auto p-3 mb-3 text-left">
    {{$post->machinery}}
  </div>

  <div class="text-left col-sm-6 mx-auto h3">コメント</div>
  <div class="postShowMain--comment col-sm-6 mx-auto p-3 text-left">
    {{$post->comment}}
  </div>
</button>{{-- .postShowMain --}}
@endsection