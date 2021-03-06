<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="{{asset('./images/icon.png')}}">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>@yield('titulo')</title>

		@yield('seo')

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet"/>
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
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
							<img src="{{asset('./images/logo.png')}}" alt="logo">
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


				<div class="collapse navbar-collapse" id="app-navbar-collapse">
						<!-- Left Side Of Navbar -->
						<ul class="nav navbar-nav">
								&nbsp;
						</ul>

						@if(Auth::check())
							<!-- Right Side Of Navbar -->
							<ul class="nav navbar-nav navbar-right">
									<!-- Authentication Links -->
								<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
												{{ Auth::user()->name }} <span class="caret"></span>
										</a>

										<ul class="dropdown-menu" role="menu">
											<li>
													<a href="/posts/add">Nova Publicação</a>
											</li>
												<li>
														<a href="/posts">Minhas Publicações</a>
												</li>
												<li>
														<a href="/logout"
																onclick="event.preventDefault();
																				 document.getElementById('logout-form').submit();">
																Logout
														</a>

														<form id="logout-form" action="/logout" method="POST" style="display: none;">
																{{ csrf_field() }}
														</form>
												</li>
										</ul>
								</li>
							</ul>
						@endif
				</div>

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
					@foreach($categories as $category)
						<a class="category" href="/search?categoria={{$category->id}}">{{$category->name}}<span>{{$category->posts}}</span></a>
					@endforeach
				<!--
        <a class="category" href="/search?categoria=2">RH <span></span></a>
        <a class="category" href="/search?categoria=3">Office <span></span></a>
        <a class="category" href="/search?categoria=4">ERP <span></span></a>
        <a class="category" href="/search?categoria=5">HelpDesk <span></span></a>
			-->
      </div>
      <!-- /category widget -->

			{{--
      <!-- posts widget -->
      <div class="widget posts-widget">
        <h3>Últimos posts</h3>
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
			--}}
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
        <a class="logo" href="/">
          <img src="{{asset('./images/logo.png')}}" alt="logo">
        </a>
      </div>
    </div>
    <!-- footer logo -->


  </div>
  <!-- /row -->

  <!-- row -->
  <div id="bottom-footer" class="row">

		<!-- copyright -->
		<div class="col-md-12">
			<div class="footer-copyright text-center">
				<span>&copy; 2018 - Felipe Trindade, Wilianm Masayuki.</span>
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
