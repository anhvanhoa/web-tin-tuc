@extends('layouts.layout-main')

@section('content')
    <h1>Category: {{ $category->name }}</h1>
    <h1>Posts</h1>

    @foreach ($category->posts as $post)
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
    @endforeach
@endsection
