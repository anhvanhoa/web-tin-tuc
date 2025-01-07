@extends('layouts.layout-auth')

@section('name', 'Đăng ký')

@section('content')
    {{-- alert error --}}
    @if (session('error'))
        <p style="color: red">
            {{ session('error') }}
        </p>
    @endif
    <form method="POST" action="{{ route('auth.register') }}">
        @csrf
        <p>
            <input type="text" name="name" placeholder="Tên">
            @error('name')
            <p style="color: red">
                {{ $message }}
            </p>
        @enderror
        </p>
        <p>
            <input type="email" name="email" placeholder="Email">
            @error('email')
            <p style="color: red">
                {{ $message }}
            </p>
        @enderror
        </p>
        <p>
            <input type="password" name="password" placeholder="Mật khẩu">
            @error('password')
            <p style="color: red">
                {{ $message }}
            </p>
        @enderror
        </p>
        <p>
            <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">
            @error('password_confirmation')
            <p style="color: red">
                {{ $message }}
            </p>
        @enderror
        </p>
        <p>
            <button type="submit">Đăng ký</button>
        </p>
    </form>
@endsection
