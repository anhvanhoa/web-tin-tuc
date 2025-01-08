@extends('layouts.layout-admin')

@section('content')
    <div class="content">
        <h1>Tags</h1>
        <p>Here you can manage Tags</p>
        {{-- alert error --}}
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        {{-- alert success --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Create tag</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slugs</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->slugs }}</td>
                        <td>{{ $tag->status }}</td>
                        <td>
                            <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning">Edit</a>
                            @if ($tag->countPost == 0)
                                <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
