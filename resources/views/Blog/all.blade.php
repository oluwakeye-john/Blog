@extends('Blog.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>

            <div class="col-md-10">
                <br>

                <p>
                    <strong style="font-size: 25px">Blogs</strong>
                    <a class="" href="{{ route('new') }}"><i class="fas fa-plus"></i></a>
                </p>

                <table class="table table-responsive">
                    <thead class="black white-text">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Published</th>
                        <th scope="col">Date Posted</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($blogs as $blog)
                        <tr>
                            <td scope="row">{{ $blog -> id  }}</td>
                            <td>{{ $blog -> title  }}</td>

                            @if($blog -> published == 1)
                                <td><input type="checkbox" checked disabled></td>
                            @else
                                <td><input type="checkbox" disabled></td>
                            @endif

                            <td>{{ date('jS F Y', strtotime($blog->updated_at ?? "")) }}</td>
                            <td>
                                <a class="btn btn-raised btn-primary btn-sm" href="{{ route('edit', $blog -> id)  }}"><span class="fa fa-edit"></span></a>

                                <form method="post" id="delete-form-{{ $blog -> id }}" action="{{ route('delete', $blog->id) }}" style="display: none">
                                    {{ csrf_field() }}
                                    {{ method_field('delete')  }}
                                </form>

                                <button onclick="if (confirm('Are you sure you want to delete this blog?')) {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $blog -> id }}').submit();
                                    }
                                    else {
                                    event.preventDefault();
                                    }" class="btn btn-raised btn-danger btn-sm">
                                    <span class="fa fa-trash"></span>
                                </button>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $blogs -> links() }}
            </div>
        </div>



    </div>


@endsection
