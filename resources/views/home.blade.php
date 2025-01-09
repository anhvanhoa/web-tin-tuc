@extends('layouts.layout-main')

@section('content')
    <section class="section mt-5">
        {{ $posts }}
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-top clearfix">
                            <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a>
                            </h4>
                        </div><!-- end blog-top -->

                        <div class="blog-list clearfix">

                            @foreach ($posts as $post)
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
                                        <p>{{ $post->description }}</p>
                                        @foreach ($post->tags as $tag)
                                            <small class="firstsmall"><a class="bg-orange"
                                                    title="">{{ $tag->name }}</a></small>
                                        @endforeach
                                        <small><a title="">{{ $post->created_at->format('d-m-Y') }}</a></small>
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
                        {{ $posts->links() }}
                    </div><!-- end row -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="widget">
                            <h2 class="widget-title">Popular Posts</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    @foreach ($popularPosts as $post)
                                        <a href="{{ route('post', $post->slugs) }}"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="{{ asset('storage/' . $post->thumbnail) }}"
                                                    alt="{{ $post->title }}" class="img-fluid float-left">
                                                <h5 class="mb-1">{{ $post->title }}</h5>
                                                {{-- format 12 Jan, 2016 --}}
                                                <small>{{ $post->created_at->format('d M, Y') }}</small>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title">Recent Comments</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    @foreach ($recentComments as $recentComment)
                                        <a href="{{ route('post', $recentComment->post->slugs) }}"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <span class="rating">
                                                    <small>{{ $recentComment->post->title }}</small>
                                                </span>
                                                <h5 class="mb-1">{{ $recentComment->content }}</h5>
                                                <span class="rating">
                                                    {{-- format 12 Jan, 2016 --}}
                                                    <small>{{ $recentComment->created_at->format('d M, Y') }}</small>
                                                </span>
                                            </div>
                                        </a>
                                    @endforeach

                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title">Follow Us</h2>

                            <div class="row text-center">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button facebook-button">
                                        <i class="fa fa-facebook"></i>
                                        <p>27k</p>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button twitter-button">
                                        <i class="fa fa-twitter"></i>
                                        <p>98k</p>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button google-button">
                                        <i class="fa fa-google-plus"></i>
                                        <p>17k</p>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button youtube-button">
                                        <i class="fa fa-youtube"></i>
                                        <p>22k</p>
                                    </a>
                                </div>
                            </div>
                        </div><!-- end widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
