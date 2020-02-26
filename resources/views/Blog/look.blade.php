@extends('Blog.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>

            <div class="col-md-10">
                <br>
                <h1> Slides </h1>
                <table class="table table-responsive">
                    <thead class="black white-text">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Caption</th>
                        <th scope="col">Link</th>
                        <th scope="col">Updated</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($carosels as $carosel)
                        <tr>
                            <td scope="row">{{ $carosel -> id  }}</td>
                            <td>{{ $carosel -> name  }}</td>
                            <td>{{ $carosel -> caption  }}</td>

                            <td>{{ $carosel -> link  }}</td>
                            <td>{{ date('jS F Y', strtotime($carosel->updated_at ?? "")) }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>


@endsection
