@extends('layouts.app')

@section('content')

  {{--成功時のメッセージ--}}
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="userShowMain col-sm-12 px-0">
    <div class="userShowMain__title h2 p-3">
      マイページ
    </div>{{-- .userShowMain__title --}}

    <div class="userShowMain__posts col-sm-12 d-flex flex-wrap">

      <div class="userShowMain__posts__todo col-sm-6 h3">
        ToDo

        <div class="userShowMain__posts__todo__list col-sm-12 d-flex flex-wrap h4">
          @foreach($todos as $todo)
            
            <div class="postBox__card col-sm-5 my-1 card mx-1">
              
              <div class="postBox__card--title pt-3">
                {{$todo->title}}
              </div>{{-- .postBox__card--title --}}
              
              <div class="postBox__card--comment card-body text-left">
                {{$todo->body}}
              </div>{{-- .postBox__card--comment --}}

              <ul class="d-flex justify-content-end">
                <li>
                <a class="btn btn-outline-secondary mr-1" href="{{route('todo.edit', ['id'=> $todo->id])}}">
                    編集
                  </a>
                </li>
                <li>
                <form method="post" action="{{route('todo.destroy', ['id'=>$todo->id])}}">
                    @csrf
                    <input type="submit" value="完了" class="btn btn-outline-danger">
              
                  </form>
                </li>
              </ul>
            </div>{{-- .postBox__card --}}

          @endforeach
        </div>{{-- .userShowMain__posts__todo__list --}}

      </div>{{-- .userShowMain__posts__todo --}}

      <div class="userShowMain__posts__title col-sm-6 h4">
        投稿一覧
        
        <div class="userShowMain__posts__list col-sm-12 d-flex flex-wrap">
          @foreach ($posts as $post)

            {{-- view/toppage/post_cardからinclude --}}
            @include('toppage.post_card')

          @endforeach
        </div>{{-- .userShowMain__posts__list --}}

      </div>{{-- .userShowMain__posts__title --}}

    </div>{{-- .userShowMain__posts --}}

  </div>{{-- .userShowMain --}}
@endsection