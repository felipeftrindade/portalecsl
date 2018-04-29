@extends('layouts.master')

@section('titulo')
	{{$title}} | ECSL
@endsection

@section('seo')
	<link rel="canonical" href="{{URL::current()}}"/>
@endsection

@section('content')
		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url({{asset('./img/page-background.jpg')}})"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<h1 class="white-text">{{$title}}</h1>
						<ul class="blog-post-meta">
							<li>
								Por : {{$post->Author->name}}&nbsp;&nbsp;|&nbsp;&nbsp;
								{{date('d M, Y à\s H:i', strtotime($post->created_at))}}
								@if ($post->updated_at !== null && $post->updated_at > $post->created_at)
									- Última atualização em {{date('d M, Y à\s H:i', strtotime($post->updated_at))}}
								@endif
							</li>
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

@if (!App::environment('local')) {
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
@endif
					<!-- /main blog -->
				</div>
@endsection
