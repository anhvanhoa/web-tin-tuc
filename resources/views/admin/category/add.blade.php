@extends('layouts.layout-admin')

@section('content')
    <div class="content">
        <h1>Add Category</h1>
        <p>Here you can add a new category</p>
        {{-- alert success --}}

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                    <div style="color:red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="slugs">Slugs</label>
                <input type="text" name="slugs" id="slugs" class="form-control" value="{{ old('slugs') }}">
                @error('slugs')
                    <div style="color:red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option {{ old('status') == 'active' ? 'selected' : '' }} value="active">Active</option>
                    <option {{ old('status') == 'inactive' ? 'selected' : '' }} value="inactive">Inactive</option>
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
