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
}
