@extends('layouts.layout-admin')

@section('content')
    <div class="content">
        <h1>Create Posts</h1>
        {{-- alert error --}}
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        {{-- alert success --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" width="100" height="100">
                <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                @error('thumbnail')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input value="{{ $post->title }}" type="text" name="title" id="title" class="form-control">
                @error('title')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="slugs">Slugs</label>
                <input value="{{ $post->slugs }}" type="text" name="slugs" id="slugs" class="form-control">
                @error('slugs')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $post->description }}</textarea>
                @error('description')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="7">{{ $post->content }}</textarea>
                @error('content')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                    <option hidden value=''>Select Category</option>
                    @foreach ($categories as $category)
                        <option {{ $post->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" id="tags" class="form-control" multiple>
                    @foreach ($tags as $tag)
                        <option {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                            value="{{ $tag->id }}">
                            {{ $tag->name }}</option>
                    @endforeach
                </select>
                @error('tags')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option {{ $post->status == 'published' ? 'selected' : '' }} value="published">published</option>
                    <option {{ $post->status == 'draft' ? 'selected' : '' }} value="draft">draft</option>
                </select>
                @error('status')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        <div>
            <h1>Comments</h1>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>Create</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post->comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>
                                    <div>
                                        <p>{{ $comment->user->name }}</p>
                                        <p>{{ $comment->user->email }}</p>
                                    </div>
                                </td>
                                <td>{{ $comment->content }}</td>
                                <td>{{ $comment->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>
                                    <form action="{{ route('admin.comments.update', $comment->id) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="status"
                                            value="{{ $comment->status == 'published' ? 'draft' : 'published' }}" hidden>
                                        <button type="submit" class="btn btn-info">
                                            {{ $comment->status == 'published' ? 'Hidden' : 'Show' }}
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="post"
                                        style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
