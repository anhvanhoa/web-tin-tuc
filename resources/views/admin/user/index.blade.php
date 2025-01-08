@extends('layouts.layout-admin')

@section('content')
    <div class="content">
        <h1>Users</h1>
        <p>Here you can manage Users</p>
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
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="" width="40" height="40">
                        </td>
                        <td>
                            <div>
                                <a href={{route('admin.users.edit', $user->id)}}>{{ $user->name }}</a>
                                <p style="font-size: 12px; margin: 0; padding: 0">{{$user->email}}</p>
                            </div>
                        </td>
                        <td>{{ $user->roles }}</td>
                        <td>{{ $user->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
