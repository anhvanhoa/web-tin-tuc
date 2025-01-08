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

        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                @error('thumbnail')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input value="{{ old('title') }}" type="text" name="title" id="title" class="form-control">
                @error('title')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="slugs">Slugs</label>
                <input value="{{ old('slugs') }}" type="text" name="slugs" id="slugs" class="form-control">
                @error('slugs')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                @error('description')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="7">{{ old('content') }}</textarea>
                @error('content')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                    <option hidden value=''>Select Category</option>
                    @foreach ($categories as $category)
                        <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
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
                        <option {{ is_array(old('tags')) && in_array($tag->id, old('tags')) ? 'selected' : '' }}
                            value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                @error('tags')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="published">published</option>
                    <option value="draft">draft</option>
                </select>
                @error('status')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
