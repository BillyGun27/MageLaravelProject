@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h2>Dashboard</h2>
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                         <form method="POST" action="/post/update/{{$post->id}}" >
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="text">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" >
                            </div>
                            <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea class="form-control" rows="5" id="content" name="content" >{{$post->content}}</textarea>
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

        </div>
    </div>
</div>
@endsection


