@extends('layouts.frontend.app')

@section('title','Category')

@push('css')
    <link href="{{ asset('assets/frontend/css/category/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/category/responsive.css') }}" rel="stylesheet">
    <style>
        .slider {
            height: 400px;
            width: 100%;
            background-image: url({{ asset('storage/category/'.$category->image) }});
            background-size: cover;
        }
        .favorite_posts{
            color: blue;
        }
    </style>
@endpush

@section('content')
<section class="content">
<div class="slider display-table center-text">
		<h1 class="title display-table-cell"><b>{{ $category->name }}</b></h1>
	</div><!-- slider -->

	<section class="blog-area section">
		<div class="container">

			<div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6">
                            <div class="card h-100">
                                <div class="single-post post-style-1">

                                    <div class="blog-image"><img src="{{ asset('storage/post/'.$post->image) }}" alt="{{ $post->title }}"></div>

                                    <a class="avatar" href="{{ route('author.profile',$post->user->username) }}"><img src="{{  asset('storage/profile/'.$post->user->image) }}" alt="Profile Image"></a>

                                    <div class="blog-info">

                                    <h4 class="title"><a href="{{ route('post.details',$post->slug) }}"><b>{{ $post->title }}</b></a></h4>

                                    </div><!-- blog-info -->
                                </div><!-- single-post -->
                            </div><!-- card -->
                        </div><!-- col-lg-4 col-md-6 -->
                @endforeach

			</div><!-- row -->

			

		</div><!-- container -->
	</section><!-- section -->

@endsection

@push('js')

@endpush

