@extends('layouts.app')

@section('content')

{{--成功時のメッセージ--}}
@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
  <div class="userShowMain col-sm-12">
    <div class="userShowMain__title h2 p-3">
      マイページ
    </div>{{-- .userShowMain__title --}}
    
    <div class="userShowMain__name h3 mb-5">
      名前：{{Auth::user()->name}}
    </div>{{-- .userShowMain__title --}}
    
    <div class="userShowMain__posts col-sm-12 d-flex flex-wrap">
      <div class="userShowMain__posts__todo col-sm-6 h3">
        ToDo

        <div class="userShowMain__posts__todo__list col-sm-12 d-flex flex-wrap h4">
          @foreach($todos as $todo)
            
            <div class="TopPageMain__box__card col-sm-5 my-1 card mx-1">
              
              <div class="TopPageMain__box__card--title">
                {{$todo->title}}
              </div>{{-- .TopPageMain__box__card--title --}}
              
              <div class="TopPageMain__box__card--comment card-body text-left">
                {{$todo->body}}
              </div>{{-- .TopPageMain__box__card--comment --}}

              <ul class="d-flex justify-content-end">
                <li>
                <a class="btn btn-outline-secondary" href="{{route('todo.edit', ['id'=> $todo->id])}}">
                    編集
                  </a>
                </li>
                <li>
                  <button class="btn btn-outline-danger">
                    完了
                  </button>
                </li>
              </ul>
            </div>{{-- .TopPageMain__box__card --}}

          @endforeach

        </div>{{-- .userShowMain__posts__todo__list --}}
      </div>{{-- .userShowMain__posts__todo --}}
      <div class="userShowMain__posts__title col-sm-6 h4">
        投稿一覧
        
        <div class="userShowMain__posts__list col-sm-12 d-flex flex-wrap">
          @foreach ($posts as $post)
            <a href="{{route('post.show', ['id'=> $post->id])}}" class="TopPageMain__box--link btn btn-default">
              <div class="TopPageMain__box__card col-sm-6 my-1 card img-thumbnail">

                <div class="TopPageMain__box__card--title h4">
                  {{$post->title}}
                </div>{{-- .TopPageMain__box__card--title --}}
                
                <img  src="{{ asset('storage/' . $post->image) }}" class="TopPageMain__box__card--image rounded mx-auto d-block" alt="投稿画像">

                <div class="my-2 text-right">
                  投稿者 : {{ mb_strimwidth($post->user->name, 0, 15, '...') }}
                </div>
                
                <div class="TopPageMain__box__card--comment card-body text-left">
                  {{ mb_strimwidth($post->comment, 0, 40, '...') }}
                </div>{{-- .TopPageMain__box__card--comment --}}

              </div>{{-- .TopPageMain__box__card --}}
            </a>
          @endforeach
        </div>{{-- .userShowMain__posts__list --}}
      </div>{{-- .userShowMain__posts__title --}}
    </div>{{-- .userShowMain__posts --}}


  </div>{{-- .userShowMain --}}
@endsection