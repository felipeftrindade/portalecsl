@extends('layouts.master')

@section('titulo')
	Busca por {{ $s }} | ECSL
@endsection

@section('content')

<div class="hero-area section">

	<!-- Hero-area -->
	<div class="hero-area section">

		<!-- Backgound Image -->
		<div class="bg-image bg-parallax overlay" style="background-image:url({{asset('./images/page-background.jpg')}})"></div>
		<!-- /Backgound Image -->

		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 text-center">
					<h1 class="white-text">Buscando por "{{ $s }}"</h1>
					<ul class="blog-post-meta">
						<li>
							Encontramos {{ $posts->total() }} resultados
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
						@if( $posts->count() )
                @foreach( $posts as $post )
									<div class="col-md-6">
									<div class="single-blog">
										<div class="blog-img">
											<a href="{{'/'.$post->url}}">
												<img src="{{'./images/'.$post->image}}" alt="">
											</a>
										</div>
										<h4><a href="{{'/'.$post->url}}">{{$post->title}}</a></h4>
										<div class="blog-meta">
											<span class="blog-meta-author">Por: {{$post->Author->name}}</span>
											<div class="pull-right">
												<span>{{date('d M, Y à\s H:i', strtotime($post->created_at))}}</span>
											</div>
										</div>
									</div>
								</div>


                @endforeach
            @else
                <p>Nenhum resultado encontrado para <strong>{{ $s }}</strong></p>
            @endif

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
					<!-- /blog post -->
				<!-- /main blog -->
			</div>
@endsection
