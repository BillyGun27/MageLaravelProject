@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
                <h2>{{ $post->title }}</h2>
                {{ $post->created_at->toFormattedDateString() }} <span style="float:right">Author : {{ $post->username }}</span>
            <br><br>            
            <p>
                {{ $post->content }}
            </p>
        </div>
    </div>
</div>
@endsection



