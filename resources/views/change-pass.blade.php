@extends('layouts.layout-main')

@section('content')
    <div class="page-title ">
    </div><!-- end page-title -->

    <section class="section">
        <div class="container">
            <div class="row" style="justify-content: center;">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        {{-- alert success --}}
                        @if (session('success'))
                            <div class="alert alert-success mb-5">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- alert error --}}

                        @if (session('error'))
                            <div class="alert alert-danger mb-5">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="custombox authorbox clearfix">
                            <h4 class="small-title">Change password</h4>
                            <div class="row">
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <h4><a>{{ $user->name }}</a></h4>
                                    <form action="{{ route('auth.change-pass') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <strong>Current password:</strong> <input class="form-control" type="password"
                                                value="{{ old('current_password') }}" name="current_password" />
                                            @error('current_password')
                                                <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <strong>New password:</strong> <input class="form-control" type="password"
                                                value="{{ old('password') }}" name="password" />
                                            @error('password')
                                                <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <strong>Password confirmation:</strong> <input class="form-control" type="password"
                                                value="{{ old('password_confirmation') }}" name="password_confirmation" />
                                            @error('password_confirmation')
                                                <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mt-2" style="display: flex; justify-content: space-between;">
                                            <button class="btn btn-primary" type="submit">UPDATE</button>
                                        </div>
                                    </form>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end author-box -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
