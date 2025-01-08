@extends('layouts.layout-admin')

@section('content')
    <div class="content">
        <h1>Posts</h1>
        <p>Here you can manage Posts</p>
        {{-- alert error --}}
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        {{-- alert success --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create posts</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Thumbnail</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th>Create</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" width="40" height="40">
                        </td>
                        <td>
                            <a href="{{ route('post', $post->slugs) }}">{{ $post->title }}</a>
                        </td>
                        <td>
                            <div>
                                @foreach ($post->tags as $tag)
                                    <p style="color:{{ $tag->color }}; border: 1px solid {{ $tag->color }};">
                                        {{ $tag->name }}</p>
                                @endforeach
                            </div>
                        </td>
                        <td>{{ $post->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $post->status }}</td>
                        <td>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
