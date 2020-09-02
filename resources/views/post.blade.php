@extends('layouts.frontend.app')

@section('title')
{{ $post->title }}
@endsection

@push('css')
    <link href="{{ asset('assets/frontend/css/single-post/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/single-post/responsive.css') }}" rel="stylesheet">

    <style>
        .header-bg{
            height: 400px;
            width: 100%;
            background-image: url({{ asset('storage/post/'.$post->image) }});
            background-size: cover;
        }
        .favorite_posts{
            color: blue;
        }
    </style>

@endpush

@section('content')
<section class="content">
    <div class="header-bg">
    </div><!-- slider -->

	<section class="post-area section">
		<div class="container">

			<div class="row">

				<div class="col-lg-8 col-md-12 no-right-padding">

					<div class="main-post">

						<div class="blog-post-inner">

							<div class="post-info">

								<div class="left-area">
                                <a class="avatar" href="#"><img src="{{ asset('storage/profile/'.$post->user->image) }}" alt="Profile Image"></a>
								</div>

								<div class="middle-area">
                                <a class="name" href="#"><b>{{ $post->user->name }}</b></a>
                                    <h6 class="date">on {{ $post->created_at->diffForHumans() }}</h6>
								</div>

							</div><!-- post-info -->

							<h3 class="title"><a href="#"><b>{{ $post->title }}</b></a></h3>

							<div class="para">
                                {!! html_entity_decode($post->body) !!}
                            </div>

							<ul class="tags">

                                @foreach($post->tags as $tag)
                                    <li><a href="{{route('tag.posts', $tag->slug)}}">{{ $tag->name }}</a></li>
                                @endforeach

							</ul>
						</div><!-- blog-post-inner -->

						<!-- <div class="post-icons-area">
							<ul class="post-icons">
								<li><a href="#"><i class="ion-heart"></i>57</a></li>
								<li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
								<li><a href="#"><i class="ion-eye"></i>138</a></li>
							</ul>

							<ul class="icons">
								<li>SHARE : </li>
								<li><a href="#"><i class="ion-social-facebook"></i></a></li>
								<li><a href="#"><i class="ion-social-twitter"></i></a></li>
								<li><a href="#"><i class="ion-social-pinterest"></i></a></li>
							</ul>
						</div> -->

					

					</div><!-- main-post -->
				</div><!-- col-lg-8 col-md-12 -->

				<div class="col-lg-4 col-md-12 no-left-padding">

					<div class="single-post info-area">

						<div class="sidebar-area about-area">
							<h4 class="title"><b>ABOUT AUTHOR</b></h4>
							<p>{{ $post->user->about }}</p>
						</div>

					

						<div class="tag-area">

							<h4 class="title"><b>CATEGORIES</b></h4>
							<ul>
								@foreach($post->categories as $category)
                                <li><a href="{{route('category.posts', $category->slug)}}">{{ $category->name }}</a></li>
                                @endforeach
							</ul>

						</div><!-- subscribe-area -->

					</div><!-- info-area -->

				</div><!-- col-lg-4 col-md-12 -->

			</div><!-- row -->

		</div><!-- container -->
	</section><!-- post-area -->

@endsection

@push('js')

@endpush