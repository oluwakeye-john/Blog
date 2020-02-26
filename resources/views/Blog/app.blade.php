<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blog</title>
    <!-- MDB icon -->
    <link rel="icon" href="#" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('public/asset/css/bootstrap.min.css') }}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{ asset('public/asset/css/mdb.min.css') }} ">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{ asset('public/asset/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('public/mystyle.css') }}">

</head>

<body>

<style>
    body {
        font-size: 16px;
    }
    html {
        scroll-behavior: smooth;
    }
</style>

<!-- Start your project here-->
@include('layouts.nav')

@if(session('successMsg'))
    <div class="alert alert-success">
        {{ session('successMsg')  }}
    </div>
@endif

@if($errors->any())
    @foreach($errors ->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif

@yield('content')
@include('Blog.newsletter_modal')

<style>
    #hh {
        position: fixed;
        bottom: 20px;
        right: 20px;
    }
</style>
<button id="hh" class="btn btn-dark btn-sm" data-toggle="modal"  data-target="#basicExampleModal">Subscribe</button>

@include('layouts.footer')

<!-- End your project here-->

<!-- jQuery -->
<script type="text/javascript" src="{{ asset('public/asset/js/jquery.min.js') }}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('public/asset/js/popper.min.js') }}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('public/asset/js/bootstrap.min.js') }}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('public/asset/js/mdb.min.js') }}"></script>
<!-- Your custom scripts (optional) -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"> </script>

<script type="text/javascript" src="{{ asset('public/myscripts.js') }}"></script>

</body>
</html>
