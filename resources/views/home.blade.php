@extends('layouts.layout-main')

@section('content')
    <div>
        <h1>Trang chủ</h1>
        <h1>Bài viết</h1>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('post', $post->slugs) }}">
                        <h2>{{ $post->title }}</h2>
                    </a>
                    <p>{{ $post->content }}</p>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
