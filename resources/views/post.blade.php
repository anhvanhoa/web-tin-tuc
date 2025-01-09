@extends('layouts.layout-main')

@section('content')
    <section class="section single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-title-area text-center">
                            <ol class="breadcrumb hidden-xs-down">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('category', $post->category->slugs) }}">{{ $post->category->name }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ $post->title }}
                                </li>
                            </ol>

                            <h3>{{ $post->title }}</h3>

                            <div class="blog-meta big-meta">
                                <small><a href="tech-single.html" title="">
                                        {{ $post->created_at->format('d M, Y') }}</a></small>
                                </a></small>
                                <small><a href="tech-author.html" title="">by {{ $post->user->name }}</a></small>
                            </div><!-- end meta -->

                            <div class="post-sharing">
                                <ul class="list-inline">
                                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i>
                                            <span class="down-mobile">Share on Facebook</span></a></li>
                                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i>
                                            <span class="down-mobile">Tweet on Twitter</span></a></li>
                                    <li><a href="#" class="gp-button btn btn-primary"><i
                                                class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div><!-- end post-sharing -->
                        </div><!-- end title -->

                        <div class="single-post-media">
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="img-fluid">
                        </div><!-- end media -->

                        <div class="blog-content">
                            {!! $post->content !!}
                        </div><!-- end content -->

                        <div class="blog-title-area">
                            <div class="tag-cloud-single">
                                <span>Tags</span>
                                @foreach ($post->tags as $tag)
                                    <small><a title="">{{ $tag->name }}</a></small>
                                @endforeach
                            </div><!-- end meta -->

                            <div class="post-sharing">
                                <ul class="list-inline">
                                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i>
                                            <span class="down-mobile">Share on Facebook</span></a></li>
                                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i>
                                            <span class="down-mobile">Tweet on Twitter</span></a></li>
                                    <li><a href="#" class="gp-button btn btn-primary"><i
                                                class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div><!-- end post-sharing -->
                        </div><!-- end title -->

                        <hr class="invis1">

                        <div class="custombox authorbox clearfix">
                            <h4 class="small-title">About author</h4>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <img src="{{ asset('storage/' . $post->user->avatar) }}" alt="{{ $post->user->name }}"
                                        class="img-fluid rounded-circle">
                                </div><!-- end col -->

                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <h4><a>{{ $post->user->name }}</a></h4>
                                    <p>{{ $post->user->email }}</p>

                                    <div class="topsocial">
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                                class="fa fa-facebook"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i
                                                class="fa fa-youtube"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                                                class="fa fa-pinterest"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                                                class="fa fa-twitter"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                                                class="fa fa-instagram"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i
                                                class="fa fa-link"></i></a>
                                    </div><!-- end social -->

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end author-box -->

                        <hr class="invis1">
                        <div class="custombox clearfix">
                            <h4 class="small-title">{{ count($post->comments) }} Comments</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="comments-list">
                                        @foreach ($post->comments as $comment)
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="{{ asset('storage/' . $comment->user->avatar) }}"
                                                        alt="{{ $comment->user->name }}" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name">{{ $comment->user->name }}
                                                        <small>{{ $comment->created_at->format('d M, Y') }}</small>
                                                    </h4>
                                                    <p>{{ $comment->content }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">Leave a Reply</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{ route('comment') }}" method="POST" class="form-wrapper">
                                        @csrf
                                        <div>
                                            <input name="post_id" hidden value="{{ $post->id }}" />
                                            <textarea name="content" class="form-control" placeholder="Your comment"></textarea>
                                            @error('content')
                                                <p style="color: red">{{ $message }}</p>
                                            @enderror
                                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                                        </div>
                                        @if (session('success'))
                                            <p style="color: green">{{ session('success') }}</p>
                                        @endif
                                        @if (session('error'))
                                            <p style="color: orange">{{ session('error') }}</p>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
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
                        <div class="widget">
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="https://live.staticflickr.com/4291/35757689140_ac9f9c552c_b.jpg"
                                        alt="" class="img-fluid">
                                </div><!-- end banner-img -->
                            </div><!-- end banner -->
                        </div><!-- end widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
