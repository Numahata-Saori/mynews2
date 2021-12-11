@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ asset('storage/image/' . $headline->image_path) }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h1>{{ str_limit($headline->title, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ str_limit($headline->body, 650) }}</p>
                        </div>
                        
                        <div>
                        <!-- もしユーザーが「いいね」をしていたら -->
                        @if(Auth::user()->isliked($headline->id))
                        <!-- 「いいね」取消用ボタンを表示 -->
                          <a href="{{ route('dislike') . '?news_id=' . $headline->id }}" class="btn btn-success btn-sm">
                          いいね<img src="{{asset('img/heart-pink.png')}}" width="30px">
                            <!-- 「いいね」の数を表示 -->
                            <span class="badge">
                            	{{ count($headline->likes) }}
                            </span>
                        </a>
                        @else
                        <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                          <a href="{{ route('like') . '?news_id=' . $headline->id }}" class="btn btn-secondary btn-sm">
                          いいね<img src="{{asset('img/heart-black.png')}}" width="30px">
                            <!-- 「いいね」の数を表示 -->
                            <span class="badge">
                            	{{ count($headline->likes) }}
                            </span>
                        </a>
                        @endif
                        </div>
                        
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                            
                            <div>
                            <!-- もしユーザーが「いいね」をしていたら -->
                            @if(Auth::user()->isliked($post->id))
                            <!-- 「いいね」取消用ボタンを表示 -->
                              <a href="{{ route('dislike') . '?news_id=' . $post->id }}" class="btn btn-success btn-sm">
                              いいね<img src="{{asset('img/heart-pink.png')}}" width="30px">
                                <!-- 「いいね」の数を表示 -->
                                <span class="badge">
                                	{{ count($post->likes) }}
                                </span>
                            </a>
                            @else
                            <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                              <a href="{{ route('like') . '?news_id=' . $post->id }}" class="btn btn-secondary btn-sm">
                              いいね<img src="{{asset('img/heart-black.png')}}" width="30px">
                                <!-- 「いいね」の数を表示 -->
                                <span class="badge">
                                	{{ count($post->likes) }}
                                </span>
                            </a>
                            @endif
                            </div>
                            
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
    
    
    
    
@endsection