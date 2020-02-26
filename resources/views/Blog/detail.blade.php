@extends('Blog.app')

@section('content')

    @if(Auth::check())
        <nav class="nav grey lighten-4 py-2 justify-content-end">
            <a class="nav-link mr-4" href="{{ route('edit', $blog->id) }}">Edit</a>
        </nav>
    @endif

    <div class="container">
        <div class="text-center">
            <br>
            <h1>{{ $blog->title }}</h1>
            <br>
            <a href="{{ asset('public/images') }}/{{ $blog->image }}"><img class="img-fluid responsive" width="500px" src="{{ asset('public/images') }}/{{ $blog->image }}"></a>
        </div>

        <hr><br>
        <div class="table-responsive">
            {!! $blog->content !!}
        </div>
        <br>
    </div>
@endsection
