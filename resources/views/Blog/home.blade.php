@extends('Blog.app')

@section('content')

    @include('Blog.carosels')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="">
                    <div class="text-muted">
                        <p class="ml-4">{{ $message }}</p>
                    </div>
                    <hr><br>

                    <div class="row row-cols-1 row-cols-lg-3">
                        @foreach($blogs as $blog)
                            <div class="col mb-4">
                                <!-- Card -->
                                <div class="container-fluid">
                                    <div class="h-100">

                                        <!--Card image-->
                                        <div class="view overlay zoom">
                                            <img class="card-img-top img" height="180px" src="{{ asset('public/images') }}/{{ $blog->image }}"
                                                 alt="Card image cap">
                                            <a href="{{ route('detail', $blog->id) }}">
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>

                                        <!--Card content elegant-color white-text -->
                                        <div class="card-body   rounded-bottom">

                                            <!--Title-->
                                            <h4 class="card-title">{{ $blog->title }}</h4>
                                            <!--Text-->
                                            <p class="card-text">{{ date('g:ia jS F Y', strtotime($blog->updated_at ?? "")) }}</p>
                                            <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                                            <a href="{{ route('detail', $blog->id) }}" class="btn btn-info">
                                                <!--<h5>Read more <i class="fas fa-angle-double-right"></i></h5> class="black-text d-flex justify-content-end" -->
                                                Read More</a>
                                        </div>                                </div>
                                </div>
                                <hr>
                                <!-- Card -->
                            </div>
                        @endforeach
                    </div>
                    {{ $blogs -> links() }}
                </div>
            </div>

            <div class="col-lg-3">
                <div class="">
                    @include ('Blog.contact')
                    <hr>
                    @include('Blog.about')

                </div>
            </div>
        </div>
    </div>

@endsection
