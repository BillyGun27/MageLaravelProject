# Mage Workshop Laravel Tutorial : 

## Laravel Introduction

Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern and based on Symfony. Some of the features of Laravel are a modular packaging system with a dedicated dependency manager, different ways for accessing relational databases, utilities that aid in application deployment and maintenance, and its orientation toward syntactic sugar.

## Model View Controller
#### Model

The Model component corresponds to all the data-related logic that the user works with. This can represent either the data that is being transferred between the View and Controller components or any other business logic-related data. 

Folder :  app/

#### View

The View component is used for all the UI logic of the application. 

Folder :  resources/views

#### Controller

Controllers act as an interface between Model and View components to process all the business logic and incoming requests, manipulate data using the Model component and interact with the Views to render the final output. 

Folder :  app/http/controller

## Learning Resource
* [Official Documentation](https://laravel.com/docs/5.7/)
* [Laracast](https://www.youtube.com/channel/UC3s5g0_lyZYOu8Jjo27udAQ)
* [Stacktips Laravel Inroduction](https://stacktips.com/laravel/intro-to-laravel-php-framework-and-features)

Requirement for this project:

     "php": "^7.1.3",
     "laravel/framework": "5.7.*",

Laravel Setup :

    Install PHP 7.1.3
    Instal MySQL
    Install Composer

Update vendor folder:

        composer update
        or
        composer install

Type on cmd to create project :

        composer global require "laravel/installer"
        laravel new blogname

Check available command or reference in laravel

        php artisan list
        php artisan help [command name] 
            ex. php artisan help make:model 

Run laravel

        php artisan serve
        or
        in browser http://localhost/laravel/magelaravel/public/


Setup database in .env
    
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=homested
        DB_USERNAME=homestead
        DB_PASSWORD=secret

Setup authentication(optional):
    
        php artisan make:auth
        php artisan migrate


Setup HomeController to manage website route.
        App/Http/Controllers/HomeController.php

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


Create model , controller , migration for post
        
        php artisan make:controller PostController
        php artisan make:model Post
        php artisan make:migration create_post_table --create=posts
    
        or

        php artisan make:model Post -mc


Make CRUD (Create Read Update Delete) and put all them into PostController.php to control the data management
        App/Http/Controllers/PostController.php

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

To use the controller put it in the routes/web.php, you can directly put your code into routes/web.php but it is more recommended to put it in the app/http/controller to make your code more organizable

        Route::get('/', 'HomeController@index');

        Route::get('/detail/{post}', 'HomeController@detail');

        Auth::routes();

        Route::get('/home', 'HomeController@home')->name('home');
        Route::get('/home/edit/{idpost}', 'HomeController@edit');


        Route::post('/post/create', 'PostController@create');
        Route::post('/post/update/{idpost}', 'PostController@update');
        Route::get('/post/delete/{idpost}', 'PostController@delete');

Manage the view of the website with Blade Template. Using Blade Template make creating html page easier.
Example:

        @extends('layouts.app')

        @section('content')
        <div class="container">
        <div class="row">
                <div class="col-md-8">
                        @foreach ($post as $p)
                        <p>
                        <h4><a href="/detail/{{$p->id}}">{{ $p->title }}</a></h4>
                        {{ $p->created_at->toFormattedDateString() }} <span style="float:right">Author : {{ $p->username }}</span>
                        </p>
                        @endforeach
                </div>
        </div>
        </div>
        @endsection

in Laravel , there is two way to control the database. With Query Builder and Eloquent.
Eloquent is created by laravel to make manage database easier

        Get Data Example with Query Bulider 

                DB::table('users')->get();
                DB::table('users')->where('name', 'John')->first();


        Get Data Example with Eloquent

                App\Flight::all();
                App\Flight::where('active', 1)->orderBy('name', 'desc')->take(10)->get();


That some of the basic using laravel. You can use this project for reference. Run this Project on your own computer to see how Basic Laravel works.
