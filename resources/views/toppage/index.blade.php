@extends('layouts.app')

@section('content')
  {{--成功時のメッセージ--}}
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @guest
      <div class="bg-light col-sm-6 mx-auto p-4 mb-4 shadow">
        <p class="h4 py-2">カメラ好き・写真好きがカメラで撮った写真のシェアサイト</p>
        <p>撮影した写真を使用機材、コメントと一緒に投稿することができます</p>
        <p>マイページではやることを管理するTo Do機能が使えます</p>
        <img src="{{ asset('/images/image.png') }}" alt="イメージ画像" width="500px" class="w-100">
      </div>
  @endguest

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

        {{-- view/toppage/post_cardからinclude --}}
        @include('toppage.post_card')

      @endforeach
      <div class="col-sm-12 d-flex justify-content-center mt-4">
        
      {{-- ページネートを表示する為の記述 --}}
      {{ $posts->links() }}
      </div>
    </div>{{-- .postBox --}}
@endsection