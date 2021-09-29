<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'user_id' => 'required',
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
