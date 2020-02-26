@extends('Blog.app')

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <div class="container">

                    <!--Section: Contact v.2-->
                    <section class="mb-4">

                        <!--Section heading-->
                        <h2 class="h1-responsive font-weight-bold text-center my-4">Edit Blog</h2>
                        <!--Section description-->
                        <p class="text-center w-responsive mx-auto mb-5"></p>

                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12 mb-md-0 mb-5">
                                <form id="new_form" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!--Grid row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-form mb-0">
                                                <input type="text" id="subject" name="title" value="{{ $blog->title }}" class="form-control" required>
                                                <label for="subject" class="">Title*</label>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <label>Cover Image*</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" id="image"  accept="image/*"  class="custom-file-input" value="{{ $blog->image }}" name="image">
                                            <label class="custom-file-label" for="inputGroupFile01">{{ $blog->image }}</label>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="text-center" id="avt">
                                        <br>
                                        <img class="img-fluid responsive" width="500px" src='{{ asset('public/images') }}/{{ $blog->image }}'>"
                                    </div>
                                    <br>
                                    <!--Grid row-->

                                    <!--Grid row-->
                                    <div class="row">

                                        <!--Grid column-->
                                        <div class="col-md-12">

                                            <div class="md-form">
                                                <textarea type="text" id="contents" name="contents" rows="10" class="contents form-control md-textarea">{!! $blog->content !!}</textarea>
                                            </div>

                                        </div>
                                    </div>

                                    <br>

                                    <!-- Default checked -->
                                    <div class="custom-control custom-checkbox">
                                        @if($blog -> published == 1)
                                            <input type="checkbox" class="custom-control-input" id="defaultChecked2" checked name="published" value="1">
                                        @else
                                            <input type="checkbox" class="custom-control-input" id="defaultChecked2" name="published" value="1">
                                        @endif

                                        <label class="custom-control-label" for="defaultChecked2">Publish</label>
                                    </div>

                                    <br>
                                    <!--Grid row-->
                                    <div class="text-center text-md-left">
                                        <input type="submit" class="btn btn-primary" value="POST" name="sbutton">
                                    </div>

                                </form>

                                <div class="status"></div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-3 text-center">

                            </div>
                            <!--Grid column-->

                        </div>

                    </section>
                    <!--Section: Contact v.2-->
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('public/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"> </script>

    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    <script>

        $("#image").change(function () {
            var q = $("#image").val()
            console.log(q);
            var output = document.getElementById("image");
            output.src = URL.createObjectURL(event.target.files[0]);
            document.getElementById("avt").innerHTML = "<br><img class=\"img-fluid responsive\" width=\"500px\" src='" + output.src +  "' class='rounded'>";
            console.log(output.src);
        })

        // tinymce.init({
        //     selector:'textarea.contents',
        //     plugins: 'preview',
        //
        // });

        CKEDITOR.replace( 'contents' );
    </script>

@endsection







