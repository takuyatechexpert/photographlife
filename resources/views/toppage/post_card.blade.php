<a href="{{route('post.show', ['id'=> $post->id])}}" class="postBox--link btn btn-default" role="button">
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
