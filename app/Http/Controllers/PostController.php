<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function create(Request $request)
    {
        // Validate the request...

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->username = auth()->user()->name;//auth()->id()
        $post->save();

        return back();
    }

    public function update(Request $request)
    {
        // Validate the request...

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::find($request->idpost);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect('/home');
    }

    public function delete(Request $request)
    {

        $post = Post::find($request->idpost);
        $post->delete();

        return back();
    }

}
