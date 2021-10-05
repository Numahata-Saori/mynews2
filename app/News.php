<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'user_id' => 'required',
        'title' => 'required',
        'body' => 'required',
    );
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    // News Modelに関連付けを行う
    public function histories() {
        return $this->hasMany('App\History');
    }
    
    
}
