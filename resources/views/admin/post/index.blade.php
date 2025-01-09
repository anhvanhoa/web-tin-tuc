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
                            <h6 class="text-white text-capitalize ps-3">Posts Manager</h6>
                            <li class="nav-item d-flex align-items-center">
                                <a class="btn btn-primary btn-sm mb-0 me-3" href="{{ route('admin.posts.create') }}">Create
                                    post</a>
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
                                            THUMBNAIL</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            TITLE</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            CATEGORY</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            CREATE</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            STATUS</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <span class="mb-0 text-sm ms-2">
                                                        {{ $post->id }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt=""
                                                    style="aspect-ratio: 16 / 9;" width="100px">
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $post->title }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $post->category->name }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $post->created_at->format('d M, Y') }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $post->status }}
                                            </td>
                                            <td class="align-middle">
                                            <td>
                                                <a href="{{ route('admin.posts.edit', $post->id) }}"
                                                    class="text-info px-2 mx-2">Edit</a>
                                                <button style="border:none; background: transparent;" type="button"
                                                    class="text-danger font-weight-bold text-xs" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal-{{ $post->id }}">
                                                    Delete
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{ $post->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel-{{ $post->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this post?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <form
                                                                    action="{{ route('admin.posts.destroy', $post->id) }}"
                                                                    method="post" style="display: inline-block">
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
