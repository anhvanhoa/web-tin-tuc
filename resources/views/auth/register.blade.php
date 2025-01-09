@extends('layouts.layout-auth')

@section('name', 'Create an account')
@section('des', 'Create an account to get full access to our articles')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-wrapper">
                    <div class="row" style="justify-content: center">
                        {{-- alert success --}}
                        @if (session('success-register'))
                            <p style="color: green">
                                {{ session('success-register') }}
                            </p>
                        @endif

                        {{-- alert error --}}
                        @if (session('error'))
                            <p style="color: red">
                                {{ session('error') }}
                            </p>
                        @endif
                        <div class="col-lg-7">
                            <form class="form-wrapper" method="POST" action="{{ route('auth.register') }}">
                                @csrf
                                <input type="text" name="name" class="form-control" placeholder="Yout name">
                                @error('name')
                                    <p style="color: red">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <input type="text" name="email" class="form-control" placeholder="Email address">
                                @error('email')
                                    <p style="color: red">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                @error('password')
                                    <p style="color: red">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Password confirmation">
                                @error('password_confirmation')
                                    <p style="color: red">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <button type="submit" class="btn btn-primary">Register</button>
                            </form>
                            {{-- redirect login --}}
                            <div class="form-wrapper mt-3">
                                <p>Already have an account? <a href="{{ route('auth.login') }}">Login</a></p>
                            </div>
                        </div>

                    </div>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
@endsection
