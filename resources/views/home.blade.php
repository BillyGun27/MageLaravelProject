@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h2>Dashboard</h2>
            <div class="card">
                <div class="card-header">Add Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                         <form method="POST" action="/post/create" >
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="text">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" >
                            </div>
                            <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea class="form-control" rows="5" id="content" name="content" ></textarea>
                            </div> 
                           
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form> 

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">My Post</div>
                <div class="card-body">
                        @foreach ($post as $p)
                        <p>
                        <h4>{{ $p->title }}</h4>
                        {{ $p->created_at->toFormattedDateString() }} <span style="float:right"> <a href="home/edit/{{$p->id}}" class="btn btn-info" role="button">Edit</a> <a href="post/delete/{{$p->id}}" class="btn btn-info" role="button">Delete</a> </span>
                        </p>
                        @endforeach
                </div>
            </div>


        </div>
    </div>
</div>
@endsection


