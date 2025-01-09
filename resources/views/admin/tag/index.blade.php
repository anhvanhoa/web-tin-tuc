@extends('layouts.layout-admin')

@section('content')
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
                            <li class="nav-item d-flex align-items-center">
                                <a class="btn btn-primary btn-sm mb-0 me-3" href="{{ route('admin.tags.create') }}">Create
                                    tag</a>
                            </li>
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
                                            NAME</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            STATUS</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <span class="mb-0 text-sm ms-2">
                                                        {{ $tag->id }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"
                                                    style="color: {{ $tag->color }};">{{ $tag->name }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm {{ $tag->status == 'active' ? 'bg-gradient-success' : 'bg-gradient-secondary' }}">
                                                    {{ $tag->status }}
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('admin.tags.edit', $tag->id) }}"
                                                    class="text-info font-weight-bold text-xs">Edit</a>
                                                @if ($tag->countPost == 0)
                                                    <button style="border:none; background: transparent;" type="button"
                                                        class="text-danger font-weight-bold text-xs" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal-{{ $tag->id }}">
                                                        Delete
                                                    </button>
                                                @endif
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{ $tag->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel-{{ $tag->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <p class="text-center">Are you sure you want to delete this
                                                                    tag?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <form action="{{ route('admin.tags.destroy', $tag->id) }}"
                                                                    method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Confirm
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
