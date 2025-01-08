@extends('layouts.layout-admin')

@section('content')
    <div class="content">
        <form action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h1>Users: {{ $user->name }}</h1>
                    {{-- button submit --}}
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                {{-- alert error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                {{-- alert success --}}
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
            <div class="form-group">
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" width="50" height="50">
                <input type="file" name="avatar" id="avatar" class="form-control">
                @error('avatar')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                @error('name')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
                @error('email')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">female</option>
                    <option value="orther">orther</option>
                </select>
                @error('gender')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="roles">Role</label>
                <select name="roles" id="roles" class="form-control">
                    <option {{ $user->roles == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                    <option {{ $user->roles == 'user' ? 'selected' : '' }} value="user">User</option>
                </select>
                @error('roles')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option {{ $user->status == 'active' ? 'selected' : '' }} value="active">Active</option>
                    <option {{ $user->status == 'locked' ? 'selected' : '' }} value="locked">Locked</option>
                </select>
                @error('status')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
        </form>
        <p>Posts: {{ count($user->posts) }}</p>
        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px;">
            @foreach ($user->posts as $post)
                <div style="border: 1px solid #ccc; padding: 10px;">
                    <a href="{{ route('post', $post->slugs) }}">
                        <h3>{{ $post->title }}</h3>
                    </a>
                    <p>{{ $post->content }}</p>
                    <p>Tags:
                        @foreach ($post->tags as $tag)
                            <span>{{ $tag->name }}</span>
                        @endforeach
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
