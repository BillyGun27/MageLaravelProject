@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
                    @foreach ($post as $p)
                    <p>This is user {{ $p->title }}</p>
                    @endforeach
        </div>
    </div>
</div>
@endsection



