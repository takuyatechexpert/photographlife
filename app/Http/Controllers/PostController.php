<?php

namespace App\Http\Controllers;

// Intervention Imageを使用する為のuse
use Intervention\Image\Facades\Image;
// storageに保存する為に必要
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::getUser();

        return view('post.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // 
        ini_set('memory_limit', '256M');

            $post = new Post;

            $image = $request->file('file');
            
            // よく分からないがこれでresizeできるresize(横, 縦)
            // Image::makeは画像をキャッチできる
            // aspectRatio アスペクト比を維持しながらリサイズすることができる
            $imageResize = Image::make($image)
            ->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
                });

            // imageファイルの名前
            $fileName = $imageResize->basename . '.jpeg';

            // storage::dixkについて公式ドキュメントを見ると初期はlocalでpathはstorage/app
            // シンボルリンクを貼って保存したい場所はstorage/app/publicに保存したい
            // その為に 'public' を指定する事した
            // $image->encode()で画像情報を取得できた
            Storage::disk('public')->put($fileName, $imageResize->encode());

            $post->image = $fileName;
            $post->title = $request->input('title');
            $post->machinery = $request->input('machinery');
            $post->user_id = $request->input('user_id');
            $post->comment = $request->input('comment');
            $post->save();
            
            return redirect('/')->with('success', '投稿が完了しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
        $post = Post::find($id);

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $post = Post::find($id);

        // return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post = Post::find($id);
        $post->delete();

        return redirect()->route('user.show',['id'=> Auth::user() -> id])
                ->with('success', '投稿を削除しました。');
    }
}
