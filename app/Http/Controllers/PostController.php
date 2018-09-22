<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    //
    public function store(Request $request)
    {
        // Validate the request...

        $post = new Post;
        $post->title = "first post";
        $post->content = "this is the basic of laravel";
        $post->user_id = "1";
        $post->save();
    }

}
