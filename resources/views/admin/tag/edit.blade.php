@extends('layouts.layout-admin')

@section('content')
    <div class="content">
        <h1>Edit Tag</h1>
        <p>Here you can add a new Tag</p>
        {{-- alert success --}}

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- alert error --}}
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $tag->name }}">
                @error('name')
                    <div style="color:red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="slugs">Slugs</label>
                <input type="text" name="slugs" id="slugs" class="form-control" value="{{ $tag->slugs }}">
                @error('slugs')
                    <div style="color:red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="status">Color</label>
                <input type="color" name="color" id="color" class="form-control" value="{{ $tag->color }}">
                @error('status')
                    <div style="color:red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option {{ $tag->status == 'active' ? 'selected' : '' }} value="active">Active</option>
                    <option {{ $tag->status == 'inactive' ? 'selected' : '' }} value="inactive">Inactive</option>
                </select>
                @error('status')
                    <div style="color:red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
