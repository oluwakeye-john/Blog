@extends('Blog.app')

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <div class="container">
                    <!-- Material form login -->
                    <br>
                    <div class="card">

                        <h5 class="card-header info-color white-text text-center py-4">
                            <strong>Login</strong>
                        </h5>

                        <!--Card content-->
                        <div class="card-body px-lg-5 pt-0">

                            <!-- Form -->
                            <form class="text-center" style="color: #757575;" action="{{ route('login') }}" method="post">
                            @csrf
                            <!-- Email -->
                                <div class="md-form">
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autocomplete="email" autofocus>
                                    <label for="email">E-mail</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="md-form">
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                                    <label for="password">Password</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-around">
                                    <div>
                                        <!-- Remember me -->
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="materialLoginFormRemember">Remember me</label>
                                        </div>
                                    </div>
                                    <div>
                                        <!-- Forgot password -->
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                                        @endif
                                    </div>
                                </div>

                                <!-- Sign in button -->
                                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>
                                <br>

                            </form>
                            <!-- Form -->

                        </div>


                    </div>
                    <!-- Material form login -->
                </div>
            </div>
        </div>
    </div>

    <br>

@endsection
