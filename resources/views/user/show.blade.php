@extends('layouts.app')

@section('content')

{{--成功時のメッセージ--}}
@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
  <div class="userShowMain">
    <div class="userShowMain__title h2 p-3">
      マイページ
    </div>{{-- .userShowMain__title --}}
    
    <div class="userShowMain__name h3 mb-5">
      名前：{{Auth::user()->name}}
    </div>{{-- .userShowMain__title --}}
    
    <div class="userShowMain__posts">
      <div class="userShowMain__posts__todo col-sm-5">
        ToDo
        
        <div class="userShowMain__posts__todo__list">
          <div>
            やることリスト
          </div>
          <div>
            やることリスト
          </div>
          <div>
            やることリスト
          </div>
          <div>
            やることリスト
          </div>
        </div>
      </div>
      <div class="userShowMain__posts__title col-sm-5">
        投稿一覧
        
        <div class="userShowMain__posts__list">
          @foreach ($posts as $post)
            <a href="#" class="TopPageMain__box--link btn btn-default">
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
            </a>
          @endforeach
        </div>{{-- .userShowMain__posts__list --}}
      </div>{{-- .userShowMain__posts__title --}}
    </div>{{-- .userShowMain__posts --}}


  </div>{{-- .userShowMain --}}
@endsection