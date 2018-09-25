<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['home']);
        //->except(['index','detail']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view( 'index' , ['post' => $post ]);
    }

    public function detail(Request $request)
    {
        $post = Post::find($request->post);
        return view('detail' , ['post' => $post ]);
    }

    //you can also do it like this
    /*
    public function detail(Post $post)
    {
        $post = App\Flight::find(1);
        return view('detail' , ['post' => $post ]);
    }
    */

    public function home()
    {
        $post = Post::all();
        return view( 'home' , ['post' => $post ]);
    }

    public function edit(Request $request)
    {
        $post = Post::find($request->idpost);
        return view( 'edit' , ['post' => $post ]);
    }
}
