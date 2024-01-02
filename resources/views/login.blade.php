@extends('admin.layouts.app')

@section('styles')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
@endsection

@section('title')
    Login
@endsection

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                <main class="text-center">
                    <form action="{{route('admin.auth')}}" method="POST">
                        @csrf
                        <img src="https://cdn.pixabay.com/photo/2016/12/20/05/36/store-1919731_1280.png" alt="Logo" class="mb-4 rounded" 
                            width="72" height="57">
                        <h1 class="h3 mb-3 fw-normal">
                            Please sign in 
                        </h1>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror">
                            <label for="email">Email Address*</label>
                            @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror">
                            <label for="password">Password*</label>
                            @error('password')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" name="remember_me" value="1"> Remember me
                            </label>
                        </div>
                        <button type="submit" class="w-100 btn btn-lg btn-primary">
                            Sign in
                        </button>
                        <p class="mt-5 mb-3 text-muted">
                            &copy; {{ \Carbon\Carbon::now()->year }}
                        </p>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection