<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
    
    public function news() {
        return $this->hasMany('App\News');
    }
    
    public function profile() {
        return $this->hasOne('App\Profile');
    }
    
    public function likes() {
        return $this->hasMany('App\Like');
    }
    
    public function isliked($news_id) {
        $like = Like::where('news_id', $news_id)->where('user_id', $this->id)->first();
        return $like != null;
    }
    
    // その人がいいねをしたニュースを全部取得
    // Userモデルに実装する関数
    public function likedNews() {
      return $this->hasManyThrough('App\News', 'App\Like');
    }
}
