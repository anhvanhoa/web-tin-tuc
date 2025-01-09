@extends('layouts.layout-admin')

@section('content')
    {{-- <div class="content">
        <form action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h1>Users: {{ $user->name }}</h1>
                    
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                
                @if ($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                
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
    </div> --}}
    <div class="container-fluid px-2 px-md-4">
        <div class="card card-body mx-2 mx-md-2">
            <div class="row">
                <div class="col-xl-6 col-12" id="myTabContent">
                    <div class="row gx-4 mb-2">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="profile_image"
                                    class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    {{ $user->name }}
                                </h5>
                                <p class="mb-0 font-weight-normal text-sm">
                                    {{ $user->email }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="justify-content: center">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="post" class="col-12"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                                @endif

                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="color" class="form-label">Avatar</label>
                                <input style="background: #e7e7e7; padding-inline: 8px; height: 40px;" type="file"
                                    name="avatar" id="avatar" class="form-control">
                                @error('avatar')
                                    <div style="font-size: 14px;color :red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input style="background: #e7e7e7; padding-inline: 8px;" type="text" class="form-control"
                                    value="{{ $user->name }}" id="name" name="name">
                                @error('name')
                                    <div style="font-size: 14px;color :red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input style="background: #e7e7e7; padding-inline: 8px;" type="text" class="form-control"
                                    value="{{ $user->email }}" id="email" name="email">
                                @error('email')
                                    <div style="font-size: 14px;color :red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select style="background: #e7e7e7; padding-inline: 8px;" name="gender" id="gender"
                                    class="form-control">
                                    <option {{ $user->gender == 'male' ? 'selected' : '' }} value="male">Male
                                    </option>
                                    <option {{ $user->gender == 'female' ? 'selected' : '' }} value="female">female
                                    </option>
                                    <option {{ $user->gender == 'orther' ? 'selected' : '' }} value="orther">orther
                                    </option>
                                </select>
                                @error('gender')
                                    <div style="font-size: 14px;color :red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="roles" class="form-label">Role</label>
                                <select style="background: #e7e7e7; padding-inline: 8px;" name="roles" id="roles"
                                    class="form-control">
                                    <option {{ $user->roles == 'admin' ? 'selected' : '' }} value="admin">Admin
                                    </option>
                                    <option {{ $user->roles == 'user' ? 'selected' : '' }} value="user">User
                                    </option>
                                </select>
                                @error('roles')
                                    <div style="font-size: 14px;color :red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control"
                                    style="background: #e7e7e7; padding-inline: 8px;">
                                    <option {{ $user->status == 'active' ? 'selected' : '' }} value="active">Active
                                    </option>
                                    <option {{ $user->status == 'locked' ? 'selected' : '' }} value="locked">Locked
                                    </option>
                                </select>
                                @error('status')
                                    <div style="font-size: 14px;color :red">{{ $message }}</div>
                                @enderror
                            </div>
                            <button style="padding-inline: 32px" type="submit" class="btn btn-primary">SAVE</button>

                        </form>
                    </div>
                </div>
                <div class="col-xl-6 col-12" id="myTabContent">
                    <div class="mb-4 ps-3">
                        <h6 class="mb-1">Posts: {{ count($user->posts) }}</h6>
                        <p class="text-sm">User's recent posts</p>
                    </div>
                    <div class="row">
                        @foreach ($user->posts as $post)
                            <div class="col-xl-6 col-12 mb-xl-0 mb-4">
                                <div class="card card-blog card-plain">
                                    <div class="card-header p-0 m-2">
                                        <a href="{{ $post->status == 'published' ? route('post', $post->slugs) : '#' }}"
                                            class="d-block shadow-xl border-radius-xl" style="aspect-ratio: 16 / 9;">
                                            <img style="width: 100%; aspect-ratio: 16 / 9;"
                                                src="{{ asset('storage/' . $post->thumbnail) }}" alt="img-blur-shadow"
                                                class="img-fluid shadow border-radius-lg">
                                        </a>
                                    </div>
                                    <div class="card-body p-3">
                                        <p class="mb-0 text-sm">{{ $post->status }}</p>
                                        <a href="{{ $post->status == 'published' ? route('post', $post->slugs) : '#' }}">
                                            <h5>
                                                {{ $post->title }}
                                            </h5>
                                        </a>
                                        <p class="mb-1 text-sm">
                                            {!! $post->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
