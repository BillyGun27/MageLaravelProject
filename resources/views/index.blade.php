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



