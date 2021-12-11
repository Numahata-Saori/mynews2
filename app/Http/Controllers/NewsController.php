<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\News;
use App\Like;
use Auth;

class NewsController extends Controller
{
    //
    public function index(Request $request) {
        $posts = News::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        
        $like = Like::where('news_id', $request->news_id)->where('user_id', Auth::id())->first();
        // $like = Like::where('news_id', $news->id)->where('user_id', auth()->user()->id)->first();
        
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
    
    
}
