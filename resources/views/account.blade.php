@extends('layouts.layout-main')

@section('content')
    <h1>Account</h1>

    <form action="{{ route('me.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <img width="50px" height="50px"
                src="@if ($user->avatar) {{ asset('storage/' . $user->avatar) }} @else {{ 'https://placehold.co/400x400' }} @endif"
                alt="{{ $user->name }}" />
            <p>
                <input type="file" name="avatar" />
            </p>
            @error('avatar')
                <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <strong>Name:</strong> <input type="text" value="{{ $user->name }}" name="name" />
            @error('name')
                <p style="color: red">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <strong>Email:</strong> <input type="text" value="{{ $user->email }}" name="email" />
            @error('email')
                <p style="color: red">{{ $message }}</p>
            @enderror
        </div>
        @if (session('error'))
            <p style="color: orange">{{ session('error') }}</p>
        @endif
        <div>
            <button type="submit">Cập nhập</button>
        </div>
    </form>

    <h1>Posts</h1>
    @if (count($user->posts) > 0)
        <ul>
            @foreach ($user->posts as $post)
                <li>
                    <a href="{{ route('post', $post->slugs) }}">
                        <h2>{{ $post->title }}</h2>
                    </a>
                    <p>{{ $post->content }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>Trống</p>
    @endif
@endsection
