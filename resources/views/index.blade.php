@extends('layouts.master')

@section('titulo')
	Empreendendo com Software Livre
@endsection
@section('content')
		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/page-background.jpg)"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<!--<ul class="hero-area-tree">
							<li><a href="index.html">Home</a></li>
							<li>Blog</li>
						</ul>-->
						<h1 class="white-text">Empreendendo com Software Livre</h1>

					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->

		<!-- Blog -->
		<div id="blog" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- main blog -->
					<div id="main" class="col-md-9">

						<!-- row -->
						<div class="row">

              @foreach($posts as $post)
                <!-- single blog -->
  							<div class="col-md-6">
  								<div class="single-blog">
  									<div class="blog-img">
  										<a href="{{'/'.$post->url}}">
  											<img src="{{asset('images/'.$post->image)}}">
  										</a>
  									</div>
  									<h4><a href="{{'/'.$post->url}}">{{$post->title}}</a></h4>
  									<div class="blog-meta">
											<span class="description"></span>
  										<span class="blog-meta-author">Por: {{$post->Author->name}}</span>
  										<div class="pull-right">
  											<span>{{date('d M, Y à\s H:i', strtotime($post->created_at))}}</span>
  											<span class="blog-meta-comments"><a href="{{'/'.$post->url}}#disqus_thread" data-disqus-identifier="{{$post->url}}"></a></span>
  										</div>
  									</div>
  								</div>
  							</div>
  							<!-- /single blog -->
              @endforeach
						</div>
						<!-- /row -->

						<!-- row -->
						<div class="row">
							<!-- pagination -->
							<div class="col-md-12">
								<div class="post-pagination">
									{{$posts->links()}}
								</div>
							</div>
							<!-- pagination -->
						</div>
						<!-- /row -->
					</div>
					<!-- /main blog -->
@endsection
@if (!App::environment('local')) {
	@section('count-disqus')
		<script id="dsq-count-scr" src="//portalecsl.disqus.com/count.js" async></script>
	@endsection
@endif
