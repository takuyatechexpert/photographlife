<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //

    protected $fillable = ['title', 'body', 'user_id',];
    Public function user()
    {
        return  $this->belongsTo('App\Models\User');
        // 第二引数はforeign_keyを指定すると思っていたが
        // 自分で命名した外部キー（カスタムキー名）のカラム銘を記述する
        // 第三引数に親モデルの紐付けたいキーが主キー(id)でない場合に記述する必要がある
        // 子モデルの外部キー名が親モデルの名前と同じであれば引数はいらない
    }
}
