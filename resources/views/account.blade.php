@extends('layouts.layout-main')

@section('content')
    <div class="page-title ">
    </div><!-- end page-title -->

    <section class="section">
        <div class="container">
            <div class="row" style="justify-content: center;">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        {{-- alert success --}}
                        @if (session('success'))
                            <div class="alert alert-success mb-5">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- alert error --}}

                        @if (session('error'))
                            <div class="alert alert-danger mb-5">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="custombox authorbox clearfix">
                            <h4 class="small-title">Account</h4>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt=""
                                        class="img-fluid rounded-circle" style="aspect-ratio: 1;">
                                </div><!-- end col -->

                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <h4><a>{{ $user->name }}</a></h4>
                                    <form action="{{ route('me.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <input type="file" name="avatar" class="form-control" />
                                            </p>
                                            @error('avatar')
                                                <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <strong>Name:</strong> <input class="form-control" type="text"
                                                value="{{ $user->name }}" name="name" />
                                            @error('name')
                                                <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <strong>Email:</strong> <input class="form-control" type="text"
                                                value="{{ $user->email }}" name="email" />
                                            @error('email')
                                                <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mt-2" style="display: flex; justify-content: space-between;">
                                            <button class="btn btn-primary" type="submit">UPDATE</button>
                                            <a href="{{ route('auth.change-pass.view') }}">Change pass</a>
                                        </div>
                                    </form>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end author-box -->

                        <hr class="invis1">

                        <div class="blog-list clearfix">
                            @foreach ($user->posts as $post)
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="{{ route('post', $post->slugs) }}" title="">
                                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt=""
                                                    class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="{{ route('post', $post->slugs) }}"
                                                title="">{{ $post->title }}</a></h4>
                                        <p>{!! $post->description !!}</p>
                                        <small class="firstsmall">
                                            @foreach ($post->tags as $tag)
                                                <a class="bg-orange">{{ $tag->name }}</a>
                                            @endforeach
                                        </small>
                                        <small><a href="tech-single.html"
                                                title="">{{ $post->created_at->format('d M, Y') }}</a></small>
                                        <small><a href="tech-author.html" title="">by
                                                {{ $post->user->name }}</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
                            @endforeach
                        </div><!-- end blog-list -->
                    </div><!-- end page-wrapper -->

                    <hr class="invis">

                    <div class="row">
                        {{ $user->posts->links() }}
                    </div><!-- end row -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
