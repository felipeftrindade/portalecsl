@extends('layouts.admin')

@section('title')
  Nova Publicação | ECSL
@endsection

@section('custom-header')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
      tinymce.init({
         selector:'textarea',
         plugins: "autolink"
      });
    </script>
@endsection

@section('content')
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">Nova Publicação</div>
                      <div class="panel-body">
                        <form class="form-horizontal" name="add_post" method="POST" action="/posts">
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
                                   <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
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
                                   <textarea id="content" class="form-control" name="content">{{ old('content') }}</textarea>
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
                                      Salvar
                                  </button>
                              </div>
                          </div>
                        </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
@endsection
