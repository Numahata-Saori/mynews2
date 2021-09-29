<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{
    //
    
    public function add() {
        return view('member.profile.create');
    }
    
    public function create(Request $request) {
        
        // Varidationを行う
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();


        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        // データベースに保存する
        $profile->fill($form);
        
        $profile->save();
        
        return redirect('member/profile/create');
    }
    
    public function edit() {
        return view('member.profile.edit');
    }
    
    public function update(){
        return redirect('member.profile.edit');
    }
    
    public function index(Request $request) {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Profile::where('title', $cond_title)->get();
        } else {
            $posts = Profile::all();
        }
        
        return view('member.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
}
