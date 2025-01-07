@extends('layouts.layout-main')

@section('content')
    <h1>title: {{ $post->title }}</h1>
    <h1>Category: {{ $post->category->name }}</h1>
    <h1>Tags:
        @foreach ($post->tags as $tag)
            <a href="#">{{ $tag->name }}</a>
        @endforeach
    </h1>
    <h1>Author: {{ $post->user->name }}</h1>
    <h1>Comments:</h1>
    <form action="{{ route('comment') }}" method="POST">
        @csrf
        <div>
            <input name="post_id" hidden value="{{ $post->id }}" />
            <input type="text" name="content" />
            @error('content')
                <p style="color: red">{{ $message }}</p>
            @enderror
            <div>
                <button type="submit">Đăng</button>
            </div>
        </div>
        @if (session('success'))
            <p style="color: green">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p style="color: orange">{{ session('error') }}</p>
        @endif
    </form>

    @if (count($post->comments) == 0)
        <span style="font-size: 24px">No comments</span>
    @else
        @foreach ($post->comments as $comment)
            <div style="border-bottom: 1px solid black">
                <p>{{ $comment->user->name }}</p>
                <p>{{ $comment->content }}</p>
                <p>{{ $comment->created_at->format('d/m/Y H:i:s') }}</p>
            </div>
        @endforeach
    @endif
@endsection
