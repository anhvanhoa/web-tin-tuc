@extends('layouts.layout-admin')

@section('content')
    {{-- <div class="content">
        <h1>Users</h1>
        <p>Here you can manage Users</p>
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
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
                                <a href={{ route('admin.users.edit', $user->id) }}>{{ $user->name }}</a>
                                <p style="font-size: 12px; margin: 0; padding: 0">{{ $user->email }}</p>
                            </div>
                        </td>
                        <td>{{ $user->roles }}</td>
                        <td>{{ $user->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
    <div class="container-fluid py-2">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                <span class="text-sm">{{ $errors->first() }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible text-white" role="alert">
                <span class="text-sm">{{ session('success') }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3"
                            style="display: flex; justify-content: space-between;">
                            <h6 class="text-white text-capitalize ps-3">Tags Manager</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            AVATAR</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            NAME</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ROLE</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <span class="mb-0 text-sm ms-2">
                                                        {{ $user->id }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt=""
                                                        width="40" height="40">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <a class="text-info"
                                                        href={{ route('admin.users.edit', $user->id) }}>{{ $user->name }}</a>
                                                    <p style="font-size: 12px; margin: 0; padding: 0">{{ $user->email }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td
                                                class="align-middle text-center text-sm">
                                                {{ strtoupper($user->roles) }}
                                            </td>
                                            <td
                                                class="align-middle text-center text-sm {{ $user->status == 'active' ? 'text-success' : 'text-secondary' }}">
                                                {{ strtoupper($user->status) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
