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
                        <h4 class="font-weight-bolder">Edit tag</h4>
                        <p class="mb-0">
                            Here you can edit the tag details.
                        </p>
                    </div>
                    <div class="mt-3 card-header">
                        <form role="form" action="{{ route('admin.tags.update', $tag->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input style="background: #e7e7e7; padding-inline: 8px;" type="text"
                                            class="form-control" value="{{ $tag->name }}" id="name" name="name">
                                        @error('name')
                                            <div style="font-size: 14px;color :red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="slugs" class="form-label">Slugs</label>
                                        <input style="background: #e7e7e7; padding-inline: 8px;" type="text"
                                            class="form-control" value="{{ $tag->slugs }}" id="slugs" name="slugs">
                                        @error('slugs')
                                            <div style="font-size: 14px;color :red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="color" class="form-label">Color</label>
                                        <input style="background: #e7e7e7; padding-inline: 8px; height: 40px;"
                                            type="color" class="form-control" value="{{ $tag->color }}" id="color"
                                            name="color">
                                        @error('color')
                                            <div style="font-size: 14px;color :red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="slugs" class="form-label">Status</label>
                                        <select style="background: #e7e7e7; padding-inline: 8px;" name="status"
                                            id="status" class="form-control">
                                            <option {{ $tag->status == 'active' ? 'selected' : '' }} value="active">Active
                                            </option>
                                            <option {{ $tag->status == 'inactive' ? 'selected' : '' }} value="inactive">
                                                Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <div style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn bg-gradient-primary mb-0">SAVE</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
