@extends('layouts.app')

@section('content')
  <div class="postEditMain">
    <div class="postEditMain--title h2">
      新規投稿
    </div>{{-- .postEditMain--title --}}

  <form method="POST" action="{{route('post.store')}}" class="postEditMain--form" enctype="multipart/form-data">
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
          <label class="h3 mt-4 col-sm-5 text-left mx-auto mb-0" for="inputGroupFile01">投稿画像</label>
          </div>
          
          <div class="custom-file  col-sm-5 mx-auto">
            <input type="file" name="file" class="postEditMain--file custom-file-input col-sm-5 mx-auto"
                  id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">ファイルを選択してください</label>
          </div>
        </li>

        <li>
          <div>
            <label class="h3 mt-4 col-sm-5 text-left mx-auto  mb-0" for="newPostTitle">タイトル</label>
          </div>

          <input type="text" name="title" class="postEditMain--title form-control col-sm-5 mx-auto" id="newPostTitle" placeholder="タイトルを入力してください">
        </li>

        <li>
          <div>
            <label class="h3 mt-4 col-sm-5 text-left mx-auto mb-0" for="newPostMachinery">使用機材</label>
          </div>

          <textarea rows="5" cols="40"  name="machinery" class="postEditMain--textArea form-control col-sm-5 mx-auto" id="newPostMachinery"
                    placeholder="使用機材を入力してください&#13;&#10;例&#13;&#10;オリンパス 検索結果OM-D E-M5 Mark III"></textarea>
        </li>

        <li>
          <div>
            <label class="h3 mt-4 col-sm-5 text-left mx-auto mb-0" for="newPostComment">コメント</label>
          </div>

          <textarea rows="10" cols="40"  name="comment" class="postEditMain--textArea form-control col-sm-5 mx-auto" 
                    id="newPostComment" placeholder="メッセージを入力してください"></textarea>
        </li>

        <li>
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          <input type="submit" value="Send" class="postEditMain--submit  btn btn-secondary btn-lg btn-block col-sm-3 mx-auto mt-5 py-0">
        </li>
      </ul>

    </form>{{-- .postEditMain--form --}}
    
  </div>{{-- .postEditMain --}}
@endsection