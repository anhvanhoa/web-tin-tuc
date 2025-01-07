@extends('layouts.layout-auth')

@section('name', 'Đăng nhập')

@section('content')
    {{-- alert success --}}
    @if (session('success-register'))
        <p style="color: green">
            {{ session('success-register') }}
        </p>
    @endif

    <form method="POST" action="{{ route('auth.login') }}">
        @csrf
        <div>
            <input type="email" name="email" placeholder="Email">
            @error('email')
                <p style="color: red">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div>
            <input type="password" name="password" placeholder="Mật khẩu">
            @error('password')
                <p style="color: red">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <p>
            <button type="submit">Đăng nhập</button>
        </p>
        {{-- alert error --}}

        @if (session('error'))
            <p style="color: orange">
                {{ session('error') }}
            </p>
        @endif
    </form>
@endsection
