<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Like;
use App\User;
use Auth;

class LikeController extends Controller
{
    //
    public function like(News $news, Request $request) {
      
      $like = new Like;
      $like->news_id = $request->news_id;
      $like->user_id = Auth::id();
      $result = $like->save();
      // $like->save();
      return redirect('/');
    }
    
    public function dislike(News $news, Request $request) {
      
      $like = Like::where('news_id', $request->news_id)->where('user_id', Auth::id())->first();
      // $user = Auth::id();
      // $like = Like::where('news_id', $request->news_id)->where('user_id', $user)->first();
      
      // $like->delete();
      
      // if ($like != null) {
      //   $like->delete();
      // }
      
      // if(!is_null($like)) {
      //   $like->delete();
      // }
      
      if($like) {
        $like->delete();
      }
      
      return redirect('/');
    }
    
}
