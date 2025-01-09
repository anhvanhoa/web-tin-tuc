@extends('layouts.layout-main')

@section('content')
    {{-- <h1>Category: {{ $category->name }}</h1>
    <h1>Posts</h1>

    @foreach ($category->posts as $post)
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
    @endforeach --}}


    <div class="page-title lb single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2>{{ $category->name }}</h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $category->name }}</li>
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-grid-system">
                            <div class="row">
                                @foreach ($category->posts as $post)
                                    <div class="col-md-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="{{ route('post', $post->slugs) }}" title="{{ $post->title }}">
                                                    <img src="{{ asset('storage/' . $post->thumbnail) }}"
                                                        alt="{{ $post->title }}" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta big-meta">
                                                <div style="display: flex; align-items: center; gap: 10px;">
                                                    @foreach ($post->tags as $tag)
                                                        <span class="color-orange"><a
                                                                title="">{{ $tag->name }}</a></span>
                                                    @endforeach
                                                </div>
                                                <h4><a href="{{ route('post', $post->slugs) }}"
                                                        title="">{{ $post->title }}</a></h4>
                                                <p>{!! $post->description !!}</p>
                                                <small><a
                                                        title="">{{ $post->created_at->format('d M, Y') }}</a></small>
                                                <small><a title="">by {{ $post->user->name }}</a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                @endforeach

                            </div><!-- end row -->
                        </div><!-- end blog-grid-system -->
                    </div><!-- end page-wrapper -->

                    <hr class="invis3">

                    <div class="row">
                        {{ $category->posts->links() }}
                    </div><!-- end row -->
                </div><!-- end row -->
            </div><!-- end col -->
        </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
