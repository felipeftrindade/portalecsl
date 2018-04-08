<html>
  <head>
    <title>ECSL</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if(Auth::check())
      <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
      <script>
        tinymce.init({
           selector:'textarea',
           plugins: "autolink"
        });
      </script>
    @endif
  </head>
  <body>
    <div id="app">
      <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
              <div class="navbar-header">

                  <!-- Collapsed Hamburger -->
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                      <span class="sr-only">Toggle Navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>

                  <!-- Branding Image -->
                  <a class="navbar-brand" href="{{ url('/') }}">
                      ECSL
                  </a>
              </div>

              <div class="collapse navbar-collapse" id="app-navbar-collapse">
                  <!-- Left Side Of Navbar -->
                  <ul class="nav navbar-nav">
                      &nbsp;
                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="nav navbar-nav navbar-right">
                      <!-- Authentication Links -->
                      @if (!Auth::guest())
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <ul class="dropdown-menu" role="menu">
                                  <li>
                                      <a href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                          Logout
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                  </li>
                              </ul>
                          </li>
                      @endif
                  </ul>
              </div>
          </div>
      </nav>
      @if(Auth::check())
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">Adicionar Novo Post</div>
                      <div class="panel-body">
                        <form class="form-horizontal" name="add_post" method="POST" action="{{URL::route('add_new_post')}}">
                           {{ csrf_field() }}

                           <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                               <label for="title" class="col-md-4 control-label">Titulo</label>
                               <div class="col-md-6">
                                   <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required/>
                                   @if ($errors->has('title'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('title') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                               <label for="url" class="col-md-4 control-label">URL</label>
                               <div class="col-md-6">
                                   <input id="url" type="text" class="form-control" name="url" value="{{ old('url') }}" required/>
                                   @if ($errors->has('url'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('url') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                               <label for="description" class="col-md-4 control-label">Descrição</label>
                               <div class="col-md-6">
                                   <textarea id="description" class="form-control" name="description" value="{{ old('description') }}"></textarea>
                                   @if ($errors->has('description'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('description') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                               <label for="content" class="col-md-4 control-label">Conteudo</label>
                               <div class="col-md-6">
                                   <textarea id="content" class="form-control" name="content" value="{{ old('content') }}"></textarea>
                                   @if ($errors->has('content'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('content') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                               <label for="image" class="col-md-4 control-label">Imagem</label>
                               <div class="col-md-6">
                                   <input id="image" type="text" class="form-control" name="image" value="{{ old('image') }}" required>
                                   @if ($errors->has('image'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('image') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                          <div class="form-group">
                              <div class="col-md-8 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      Postar
                                  </button>
                              </div>
                          </div>
                        </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      @else
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login</div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Usuário</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Senha</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      @endif
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}"></script>
  </div>
  </body>
</html>
