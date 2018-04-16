@extends('layouts.master')

@section('titulo')
	{{$title}} - ECSL
@endsection

@section('seo')
	<link rel="canonical" href="{{URL::current()}}"/>
@endsection

@section('content')
		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url({{asset('./img/blog-post-background.jpg')}})"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<!--<ul class="hero-area-tree">
							<li><a href="index.html">Home</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li>How to Get Started in Photography</li>
						</ul>-->
						<h1 class="white-text">{{$title}}</h1>
						<ul class="blog-post-meta">
							<li class="blog-meta-author">Por : <a href="#">{{$post->Author->name}}</a></li>
							<li>
								@if ($post->updated_at !== null && $post->updated_at > $post->created_at)
									Atualizado em {{date('d/m/Y H:i', strtotime($post->updated_at))}}
								@else
									{{date('d M, Y à\s H:i', strtotime($post->created_at))}}
								@endif								
							</li>
							<!--<li class="blog-meta-comments"><a href="#"><i class="fa fa-comments"></i> 35</a></li>-->
						</ul>
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

						<!-- blog post -->
						<div class="blog-post">
              {!!$post->content!!}
            </div>
						<!-- /blog post -->

						<!-- blog share -->
						{{--
						<div class="blog-share">
							<h4>Compartilhar:</h4>
							<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
						</div>
						--}}
						<!-- /blog share -->


						<!-- blog comments -->
						<div id="disqus_thread" class="blog-comments"></div>
						<!-- /blog comments -->
						<script>
							/**
							*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
							*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

							var disqus_config = function () {
								this.page.url = '{{URL::current()}}';  // Replace PAGE_URL with your page's canonical URL variable
								this.page.identifier = '{{$post->url}}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
							};

							(function() { // DON'T EDIT BELOW THIS LINE
								var d = document, s = d.createElement('script');
								s.src = 'https://portalecsl.disqus.com/embed.js';
								s.setAttribute('data-timestamp', +new Date());
								(d.head || d.body).appendChild(s);
							})();
						</script>
						<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

					<!-- /main blog -->
				</div>
@endsection
