@extends('Blog.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>

            <div class="col-md-10">
                <br>
                <h1> Feedbacks </h1>
                <table class="table table-responsive">
                    <thead class="black white-text">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($feedbacks as $feedback)
                        <tr>
                            <td scope="row">{{ $feedback -> id  }}</td>
                            <td>{{ $feedback -> name  }}</td>
                            <td>{{ $feedback -> email  }}</td>

                            @if( $feedback -> subject == 0)
                                <td>Default</td>
                            @elseif($feedback -> subject == 1)
                                <td>Feedback</td>
                            @elseif($feedback -> subject == 2)
                                <td>Report a bug</td>
                            @elseif($feedback -> subject == 3)
                                <td>Feature Request</td>
                            @elseif($feedback -> subject == 4)
                                <td>Others</td>
                            @endif

                            <td>{{ $feedback -> message  }}</td>
                            <td>{{ date('jS F Y', strtotime($feedback->updated_at ?? "")) }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $feedbacks -> links() }}
            </div>
        </div>


    </div>


@endsection
