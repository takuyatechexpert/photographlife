<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Todo;

class UserController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //
        // カードのテンプレートをまとめた関係でクエリビルダを使用しているので
        // こちらの記述に変更
        $query = DB::table('posts');
        $query->leftJoin('users', 'posts.user_id', '=', 'users.id')
        ->select('posts.*', 'users.name');
        $query->orderBy('updated_at', 'desc');
        $posts = $query->paginate(6, ["*"], 'postspage')
                 ->appends(["todospage" => $request->input('todospage')]);
        // appendsでtodospageのパラメーターを渡すことによってページ表示を保持できる

        // リレーション関数を使う方法
        // $posts = Post::where('user_id', $id)->orderBy('updated_at', 'desc')->paginate(6);

        $todos = Todo::where('user_id', $id)->orderBy('updated_at', 'desc')->paginate(6, ["*"], 'todospage')
                 ->appends(["postspage" => $request->input('postspage')]);
        
        return view('user.show', compact('posts', 'todos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
