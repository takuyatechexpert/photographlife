@extends('layouts.app')

@section('content')
  
<div class="postEditMain">
  <div class="postEditMain--title h2">
    新規To Do
  </div>
<form method="POST" action="{{route('todo.store')}}" class="postEditMain--form" enctype="multipart/form-data">
    {{-- enctype="multipart/form-data"の記述が重要だった
    これがないと画像がアップロードできない --}}

    {{-- エラーメッセージ --}}
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

    @csrf
    {{-- fileのnameがcontroller側で重要になる --}}
    <ul>
      <li>
        <div>
          <label class="h3 mt-4 col-sm-5 text-left mx-auto mb-0" for="newTodoTitle">タイトル</label>
        </div>

        <input type="text" name="title" class="postEditMain--title form-control col-sm-5 mx-auto" 
                id="newTodoTitle" placeholder="タイトルを入力してください" value="{{ old('title') }}">
      </li>

      <li>
        <div>
          <label class="h3 mt-4 col-sm-5 text-left mx-auto mb-0" for="newTodoBody">コメント</label>
        </div>

        <textarea rows="10" cols="40"  name="body" class="postEditMain--textArea form-control col-sm-5 mx-auto"
                  id="newTodoBody" placeholder="メッセージを入力してください">{{ old('body') }}</textarea>
      </li>
      
      <li>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="submit" value="Send" class="postEditMain--submit btn btn-secondary btn-lg btn-block col-sm-3 mx-auto mt-5 py-0">
      </li>
    </ul>
  </form>{{-- .postEditMain--form --}}
</div>{{-- .postEditMain --}}
@endsection


