@extends('layouts.master')

@section('titulo')
	{{$title}} - ECSL
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
							<li>{{date('d M, Y à\s H:i', strtotime($post->created_at))}}</li>
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

              <!--
							<p>An aeterno percipit per. His minim maiestatis consetetur et, brute tantas iracundia id sea. Vim tota nostrum reformidans te. Nam ad appareat mediocritatem, mediocrem similique usu ex, scaevola invidunt eu sed.</p>
							<p>Reque admodum praesent ei nec. Ad eius phaedrum conclusionemque cum, pri cu suas essent saperet. No vero ludus habemus qui. Per ex errem torquatos, eam in tale sumo mentitum. Cum nulla viderer no. Pri id antiopam volutpat evertitur, in vidit interpretaris nec.</p>
							<p>Te option apeirian corrumpit nec, has et tollit minimum molestie. Nam et justo everti, tale repudiandae cu nec. Aliquip legendos evertitur ne sit, mazim sadipscing sea ei. Sea no facete probatus vulputate, ex pri reque tempor. Odio adolescens ius te, docendi suscipit indoctum at qui.</p>
							<blockquote>
							  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
							</blockquote>
							<p>An aeterno percipit per. His minim maiestatis consetetur et, brute tantas iracundia id sea. Vim tota nostrum reformidans te. Nam ad appareat mediocritatem, mediocrem similique usu ex, scaevola invidunt eu sed.</p>
							<p>Reque admodum praesent ei nec. Ad eius phaedrum conclusionemque cum, pri cu suas essent saperet. No vero ludus habemus qui. Per ex errem torquatos, eam in tale sumo mentitum. Cum nulla viderer no. Pri id antiopam volutpat evertitur, in vidit interpretaris nec.</p>
							<p>Te option apeirian corrumpit nec, has et tollit minimum molestie. Nam et justo everti, tale repudiandae cu nec. Aliquip legendos evertitur ne sit, mazim sadipscing sea ei. Sea no facete probatus vulputate, ex pri reque tempor. Odio adolescens ius te, docendi suscipit indoctum at qui.</p>
            -->
            </div>

						<!-- /blog post -->

						<!-- blog share -->
						<div class="blog-share">
							<h4>Share This Post:</h4>
							<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
						</div>
						<!-- /blog share -->

						<!-- blog comments -->
						<div class="blog-comments">
							<h3>5 Comments</h3>

							<!-- single comment -->
							<div class="media">
								<div class="media-left">
									<img src="{{asset('./img/avatar.png')}}" alt="">
								</div>
								<div class="media-body">
									<h4 class="media-heading">John Doe</h4>
									<p>Cu his iudico appareat ullamcorper, at mea ignota nostrum. Nonumy argumentum id cum, eos adversarium contentiones id</p>
									<div class="date-reply"><span>Oct 18, 2017 - 4:00AM</span><a href="#" class="reply">Reply</a></div>
								</div>

								<!-- comment reply -->
								<div class="media">
									<div class="media-left">
										<img src="{{asset('./img/avatar.png')}}" alt="">
									</div>
									<div class="media-body">
										<h4 class="media-heading">John Doe</h4>
										<p>Cu his iudico appareat ullamcorper, at mea ignota nostrum. Nonumy argumentum id cum, eos adversarium contentiones id</p>
										<div class="date-reply"><span>Oct 18, 2017 - 4:00AM</span><a href="#" class="reply">Reply</a></div>
									</div>
								</div>
								<!-- /comment reply -->

								<!-- comment reply -->
								<div class="media">
									<div class="media-left">
										<img src="{{asset('./img/avatar.png')}}" alt="">
									</div>
									<div class="media-body">
										<h4 class="media-heading">John Doe</h4>
										<p>Cu his iudico appareat ullamcorper, at mea ignota nostrum. Nonumy argumentum id cum, eos adversarium contentiones id</p>
										<div class="date-reply"><span>Oct 18, 2017 - 4:00AM</span><a href="#" class="reply">Reply</a></div>
									</div>
								</div>
								<!-- /comment reply -->

							</div>
							<!-- /single comment -->

							<!-- single comment -->
							<div class="media">
								<div class="media-left">
									<img src="{{asset('./img/avatar.png')}}" alt="">
								</div>
								<div class="media-body">
									<h4 class="media-heading">John Doe</h4>
									<p>Cu his iudico appareat ullamcorper, at mea ignota nostrum. Nonumy argumentum id cum, eos adversarium contentiones id</p>
									<div class="date-reply"><span>Oct 18, 2017 - 4:00AM</span><a href="#" class="reply">Reply</a></div>
								</div>
							</div>
							<!-- /single comment -->

							<!-- blog reply form -->
							<div class="blog-reply-form">
								<h3>Leave Comment</h3>
								<form>
									<input class="input name-input" type="text" name="name" placeholder="Name">
									<input class="input email-input" type="email" name="email" placeholder="Email">
									<textarea class="input" name="message" placeholder="Enter your Message"></textarea>
									<button class="main-button icon-button">Submit</button>
								</form>
							</div>
							<!-- /blog reply form -->

						</div>
						<!-- /blog comments -->
					</div>
					<!-- /main blog -->
@endsection
