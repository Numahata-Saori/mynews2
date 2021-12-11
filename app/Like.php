<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function news() {
        return $this->belongsTo('App\News');
    }
}
