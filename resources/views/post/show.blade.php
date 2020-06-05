@extends('layouts.app')

@section('content')
  
<div class="postShowMain">
  <div class="postShowMain--title display-4 p-2">
    {{ $post->title}}
  </div>

  <div class="postShowMain--image">
    <img  src="{{ asset('storage/' . $post->image) }}" class="postShowMain--image--size col-sm-6 p-0" alt="投稿画像">
  </div>
  
  <div class="my-2 h3">
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
</>{{-- .postShowMain --}}
@endsection