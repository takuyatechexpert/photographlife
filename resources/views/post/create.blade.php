@extends('layouts.app')

@section('content')
  
<div class="postEditMain">
  <div class="postEditMain--title">
    新規投稿
  </div>
  <form method="POST" action="#" class="postEditMain--form" enctype="multipart/form-data">
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
        <input type="file" name="file" class="postEditMain--file">
      </li>
      <li>
        <input type="text" name="title" class="postEditMain--title">
      </li>
      <li>
        <textarea rows="10" cols="40"  name="description" class="postEditMain--textArea" placeholder="メッセージを入力してください"></textarea>
      </li>
      <li>
        <input type="submit" value="Send" class="postEditMain--submit">
      </li>
    </ul>
  </form>{{-- .postEditMain--form --}}
</div>{{-- .postEditMain --}}
@endsection