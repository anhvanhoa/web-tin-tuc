
@extends('layouts.layout-admin')

@section('content')
    <div class="container-fluid py-2">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible text-white mx-2" role="alert">
                <span class="text-sm">{{ session('error') }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible text-white mx-2" role="alert">
                <span class="text-sm">{{ session('success') }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="mb-3">
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mb-0 px-0 py-1 active" id="post-tab" data-bs-toggle="tab"
                                data-bs-target="#post-tab-pane" role="tab" aria-controls="post-tab-pane"
                                aria-selected="true">
                                <span class="ms-1">Edit post</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mb-0 px-0 py-1" id="comments-tab" data-bs-toggle="tab"
                                data-bs-target="#comments-tab-pane" role="tab" aria-controls="comments-tab-pane"
                                aria-selected="false">Comments ({{ count($post->comments) }})</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row px-2">
            <div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                <div class="card card-plain">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div style="flex: 1;">
                            <h4 class="font-weight-bolder">Edit Post</h4>
                            <p class="mb-0">
                                Here you can add a edit post
                            </p>
                        </div>
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" width="150"
                                style="aspect-ratio: 16 / 9;" />
                        </div>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="post-tab-pane" role="tabpanel" aria-labelledby="post-tab"
                            tabindex="0">
                            <div class="mt-3 card-header">
                                <form role="form" action="{{ route('admin.posts.update', $post->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="thumbnail" class="form-label">Thumbnail</label>
                                                <input style="background: #e7e7e7; padding-inline: 8px; height: 40px;"
                                                    type="file" name="thumbnail" id="thumbnail" class="form-control"
                                                    accept="image/*">
                                                @error('thumbnail')
                                                    <div style="font-size: 14px;color :red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select style="background: #e7e7e7; padding-inline: 8px;" name="status"
                                                    id="status" class="form-control">
                                                    <option {{ $post->status == 'published' ? 'selected' : '' }}
                                                        value="published">
                                                        published</option>
                                                    <option {{ $post->status == 'draft' ? 'selected' : '' }} value="draft">
                                                        draft
                                                    </option>
                                                </select>
                                                @error('status')
                                                    <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="category">Category</label>
                                                <select name="category_id" id="category" class="form-control"
                                                    style="background: #e7e7e7; padding-inline: 8px;">>
                                                    <option hidden value=''>Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option {{ $post->category_id == $category->id ? 'selected' : '' }}
                                                            value="{{ $category->id }}">
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div style="color: red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Title</label>
                                                <input style="background: #e7e7e7; padding-inline: 8px;" type="text"
                                                    class="form-control" value="{{ $post->title }}" id="title"
                                                    name="title">
                                                @error('title')
                                                    <div style="font-size: 14px;color :red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="slugs" class="form-label">Slugs</label>
                                                <input style="background: #e7e7e7; padding-inline: 8px;" type="text"
                                                    class="form-control" value="{{ $post->slugs }}" id="slugs"
                                                    name="slugs">
                                                @error('slugs')
                                                    <div style="font-size: 14px;color :red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="description">Description</label>
                                                <textarea style="background: #e7e7e7; padding-inline: 8px;" name="description" id="description"
                                                    class="form-control">{{ $post->description }}</textarea>
                                                @error('description')
                                                    <div style="color: red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tags">Tags</label>
                                                <select name="tags[]" id="tags" class="form-control" multiple
                                                    style="background: #e7e7e7; padding-inline: 8px;">
                                                    @foreach ($tags as $tag)
                                                        <option
                                                            {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                                            value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('tags')
                                                    <div style="color: red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class=" mb-3">
                                                <label for="content">Content</label>
                                                <textarea style="background: #e7e7e7; padding-inline: 8px;" name="content" id="content" class="form-control"
                                                    rows="7">{{ $post->content }}</textarea>
                                                @error('content')
                                                    <div style="color: red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn bg-gradient-primary mb-0">UPDATE</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="comments-tab-pane" role="tabpanel" aria-labelledby="comments-tab"
                            tabindex="0">
                            <div class="mt-2 p-2" style="background: #fff; border-radius: 10px;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Content</th>
                                            <th>Status</th>
                                            <th>Create</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($post->comments as $comment)
                                            <tr>
                                                <td>{{ $comment->id }}</td>
                                                <td>
                                                    <div>
                                                        <p>{{ $comment->user->name }}</p>
                                                        <p>{{ $comment->user->email }}</p>
                                                    </div>
                                                </td>
                                                <td>{{ $comment->content }}</td>
                                                <td>{{ $comment->status }}</td>
                                                <td>{{ $comment->created_at->format('d/m/Y H:i:s') }}</td>
                                                <td>
                                                    <form action="{{ route('admin.comments.update', $comment->id) }}"
                                                        method="POST" style="display: inline-block">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="text" name="status"
                                                            value="{{ $comment->status == 'published' ? 'draft' : 'published' }}"
                                                            hidden>
                                                        <button type="submit" class="text-info"
                                                            style="border:none; background: none; cursor: pointer;">
                                                            {{ $comment->status == 'published' ? 'Hidden' : 'Show' }}
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.comments.destroy', $comment->id) }}"
                                                        method="post" style="display: inline-block">
                                                        @csrf
                                                        @method('delete')
                                                        <button style="border:none; background: none; cursor: pointer;"
                                                            type="submit" class="text-danger">Delete</button>
                                                    </form>
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
    </div>
@endsection
