<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>@yield('titulo')</title>

		@yield('seo')

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    </head>
	<body>
    <!-- Header -->
		<header id="header">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a class="logo" href="/">
							<img src="{{asset('./img/logo.png')}}" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Mobile toggle -->
					{{--
					<button class="navbar-toggle">
						<span></span>
					</button>
					--}}
					<!-- /Mobile toggle -->
				</div>

				<!-- Navigation -->
				<!--
				<nav id="nav">
					<ul class="main-menu nav navbar-nav navbar-right">
						<li><a href="/">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Courses</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</nav>
			-->
				<!-- /Navigation -->

			</div>
		</header>
		<!-- /Header -->

    @yield('content')

    <!-- aside blog -->
    <div id="aside" class="col-md-3">

      <!-- search widget -->
      <div class="widget search-widget">
        <form action="/search" method="GET">
          <input class="input" type="text" name="s" value="{{ Request::query('s') }}" placeholder="Buscar">
          <button><i class="fa fa-search"></i></button>
        </form>
      </div>
      <!-- /search widget -->

      <!-- category widget -->
      <div class="widget category-widget">
        <h3>Categorias</h3>
				{{--
        <a class="category" href="#">Web <span>12</span></a>
        <a class="category" href="#">Css <span>5</span></a>
        <a class="category" href="#">Wordpress <span>24</span></a>
        <a class="category" href="#">Html <span>78</span></a>
        <a class="category" href="#">Business <span>36</span></a>
				--}}
      </div>
      <!-- /category widget -->

      <!-- posts widget -->
      <div class="widget posts-widget">
        <h3>Últimos posts</h3>
				{{--
        <!-- single posts -->
        <div class="single-post">
          <a class="single-post-img" href="blog-post.html">
            <img src="{{asset('./img/post01.jpg')}}" alt="">
          </a>
          <a href="blog-post.html">Pro eu error molestie deserunt.</a>
          <p><small>By : John Doe .18 Oct, 2017</small></p>
        </div>
        <!-- /single posts -->

        <!-- single posts -->
        <div class="single-post">
          <a class="single-post-img" href="blog-post.html">
            <img src="{{asset('./img/post02.jpg')}}" alt="">
          </a>
          <a href="blog-post.html">Pro eu error molestie deserunt.</a>
          <p><small>By : John Doe .18 Oct, 2017</small></p>
        </div>
        <!-- /single posts -->

        <!-- single posts -->
        <div class="single-post">
          <a class="single-post-img" href="blog-post.html">
            <img src="{{asset('./img/post03.jpg')}}" alt="">
          </a>
          <a href="blog-post.html">Pro eu error molestie deserunt.</a>
          <p><small>By : John Doe .18 Oct, 2017</small></p>
        </div>
        <!-- /single posts -->
				--}}
      </div>
      <!-- /posts widget -->

      <!-- tags widget -->
      <div class="widget tags-widget">
        <h3>Tags</h3>
				  <!--
        <a class="tag" href="#">Web</a>
        <a class="tag" href="#">Photography</a>
        <a class="tag" href="#">Css</a>
        <a class="tag" href="#">Responsive</a>
        <a class="tag" href="#">Wordpress</a>
        <a class="tag" href="#">Html</a>
        <a class="tag" href="#">Website</a>
        <a class="tag" href="#">Business</a>
			-->
      </div>
      <!-- /tags widget -->

    </div>
    <!-- /aside blog -->

  </div>
  <!-- row -->

</div>
<!-- container -->

</div>
<!-- /Blog -->

<!-- Footer -->
<footer id="footer" class="section">

<!-- container -->
<div class="container">

  <!-- row -->
  <div class="row">

    <!-- footer logo -->
    <div class="col-md-6">
      <div class="footer-logo">
        <a class="logo" href="index.html">
          <img src="{{asset('./img/logo.png')}}" alt="logo">
        </a>
      </div>
    </div>
    <!-- footer logo -->

    <!-- footer nav -->
		<!--
    <div class="col-md-6">
      <ul class="footer-nav">
        <li><a href="index.html">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Courses</a></li>
        <li><a href="blog.html">Blog</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
    </div>
	-->
    <!-- /footer nav -->

  </div>
  <!-- /row -->

  <!-- row -->
  <div id="bottom-footer" class="row">

    <!-- social -->
		<!--
    <div class="col-md-4 col-md-push-8">
      <ul class="footer-social">
        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
        <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
      </ul>
    </div>
	-->
    <!-- /social -->

    <!-- copyright -->
    <div class="col-md-8 col-md-pull-4">
      <div class="footer-copyright">
        <span>&copy; Copyright 2018. All Rights Reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com">Colorlib</a></span>
      </div>
    </div>
    <!-- /copyright -->

  </div>
  <!-- row -->

</div>
<!-- /container -->

</footer>
<!-- /Footer -->

<!-- preloader -->
<div id='preloader'><div class='preloader'></div></div>
<!-- /preloader -->


	<!-- jQuery Plugins -->
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/main.js')}}"></script>

	<!-- Disqus -->
	@yield('count-disqus')
</body>
</html>
