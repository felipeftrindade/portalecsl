@extends('layouts.master')

@section('titulo')
	Empreendendo com Software Livre
@endsection
@section('content')
		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./images/page-background.jpg)"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<h1 class="white-text">Empreendendo com Software Livre</h1>
						<span class="white-text">Aqui apresentamos softwares gratuitos e open source para seu negócio de pequeno porte.</span>
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
  											<img src="{{asset($post->image)}}">
  										</a>
  									</div>
  									<h4><a href="{{'/'.$post->url}}">{{$post->title}}</a></h4>
  									<div class="blog-meta">
  										<span class="col-xs-6 nopadding">Por: {{$post->Author->name}}</span>
  										<div class="col-xs-6 nopadding">
  											<span>{{date('d M Y à\s H:i', strtotime($post->created_at))}}</span>
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
@if (!App::environment('local'))
	@section('count-disqus')
		<script id="dsq-count-scr" src="//portalecsl.disqus.com/count.js" async></script>
	@endsection
@endif
