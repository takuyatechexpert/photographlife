<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    Public function todos()
    {
        return  $this->hasMany('App\Models\Todo');
    }

    Public function posts()
    {
        return  $this->hasMany('App\Models\Post');
        // 第二引数はforeign_keyを指定すると思っていたが
        // 自分で命名した外部キー（カスタムキー名）のカラム銘を記述する
        // 第三引数に親モデルの紐付けたいキーが主キー(id)でない場合に記述する必要がある
        // 子モデルの外部キー名が親モデルの名前と同じであれば引数はいらない
    }
}
