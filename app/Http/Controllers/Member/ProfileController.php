<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\ProfileHistory;
use Carbon\Carbon;

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

        unset($form['_token']);

        $profile->fill($form);
        
        $profile->save();
        
        return redirect('member/profile');
    }
    
    
    public function edit(Request $request) {
        
        $profile = Profile::find($request->id);
        
        if (empty($profile)) {
        abort(404);    
        }
        
        return view('member.profile.edit', ['profile_form' => $profile]);

    }
    
    
    public function update(Request $request){
        
        $this->validate($request, Profile::$rules);
        
        $profile = Profile::find($request->id);
        
        $profile_form = $request->all();
        unset($profile_form['_token']);
        
        $profile->fill($profile_form)->save();
        
        $profile_history = new ProfileHistory();
        $profile_history->profile_id = $profile->id;
        $profile_history->edited_at = Carbon::now();
        $profile_history->save();
        
        return redirect('member/profile');
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
    
   
    public function delete(Request $request)
    {
        
        $profile = Profile::find($request->id);
        
        $profile->delete();
        return redirect('member/profile/');
        
    }  
    
    
}
