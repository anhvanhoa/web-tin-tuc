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
        <div class="row px-2">
            <div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="font-weight-bolder">Create Post</h4>
                        <p class="mb-0">
                            Here you can add a new post
                        </p>
                    </div>
                    <div class="mt-3 card-header">
                        <form role="form" action="{{ route('admin.posts.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
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
                                            <option {{ old('status') == 'published' ? 'selected' : '' }} value="published">
                                                published</option>
                                            <option {{ old('status') == 'draft' ? 'selected' : '' }} value="draft">draft
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
                                                <option {{ old('category_id') == $category->id ? 'selected' : '' }}
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
                                            class="form-control" value="{{ old('title') }}" id="title" name="title">
                                        @error('title')
                                            <div style="font-size: 14px;color :red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="slugs" class="form-label">Slugs</label>
                                        <input style="background: #e7e7e7; padding-inline: 8px;" type="text"
                                            class="form-control" value="{{ old('slugs') }}" id="slugs" name="slugs">
                                        @error('slugs')
                                            <div style="font-size: 14px;color :red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <textarea style="background: #e7e7e7; padding-inline: 8px;" name="description" id="description" class="form-control">{{ old('description') }}</textarea>
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
                                                    {{ is_array(old('tags')) && in_array($tag->id, old('tags')) ? 'selected' : '' }}
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
                                        <div id="quill-editor" class="mb-3" style="height: 300px;">
                                            {!! old('content') !!}
                                        </div>
                                        <textarea rows="3" class="mb-3 d-none" name="content" id="quill-editor-area">
                                            
                                        </textarea>
                                        @error('content')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn bg-gradient-primary mb-0">CREATE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('quill-editor-area')) {
                var editor = new Quill('#quill-editor', {
                    theme: 'snow'
                });
                var quillEditor = document.getElementById('quill-editor-area');
                editor.on('text-change', function() {
                    quillEditor.value = editor.root.innerHTML;
                });
                quillEditor.addEventListener('input', function() {
                    editor.root.innerHTML = quillEditor.value;
                });
            }
        });
        var quillEditor = document.getElementById('quill-editor-area');
        editor.on('text-change', function() {
            quillEditor.value = editor.root.innerHTML;
        });
        quillEditor.addEventListener('input', function() {
            editor.root.innerHTML = quillEditor.value;
        });
    </script>
@endsection
