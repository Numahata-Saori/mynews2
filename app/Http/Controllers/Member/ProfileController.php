<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    
    public function add() {
        return view('member.profile.create');
    }
    
    public function create() {
        
        // Varidationを行う
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();


        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        // データベースに保存する
        $profile->fill($form);
        $profile->save();
        
        return redirect('member.profile.create');
    }
    
    public function edit() {
        return view('member.profile.edit');
    }
    
    public function update(){
        return redirect('member.profile.edit');
    }
    
}
