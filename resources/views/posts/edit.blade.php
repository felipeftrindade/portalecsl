@extends('layouts.admin')

@section('title')
  Editar Publicação | ECSL
@endsection

@section('custom-header')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector:'textarea#content',
        menubar: false,
        height: 300,
        plugins: [
             'advlist autolink lists link image charmap print preview anchor textcolor',
             'searchreplace visualblocks code fullscreen',
             'insertdatetime media table contextmenu paste code help wordcount'
           ]
      });
    </script>
@endsection

@section('content')
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">Editar Publicação</div>
                      <div class="panel-body">
                        <form class="form-horizontal" name="edit_post" method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           {{ method_field('PATCH') }}
                           <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                               <label for="title" class="col-md-4 control-label">Titulo</label>
                               <div class="col-md-6">
                                   @if ($errors->has('title'))
                                      <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required/>
                                       <span class="help-block">
                                           <strong>{{ $errors->first('title') }}</strong>
                                       </span>
                                   @else
                                    <input id="title" type="text" class="form-control" name="title" value="{{$post->title}}" required/>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="url" class="col-md-4 control-label">URL</label>
                               <div class="col-md-6">
                                   <input disabled="disabled" id="url" type="text" class="form-control" name="url" value="{{$post->url}}"/>
                               </div>
                           </div>

                           <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                               <label for="description" class="col-md-4 control-label">Descrição</label>
                               <div class="col-md-6">
                                   @if ($errors->has('description'))
                                       <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
                                       <span class="help-block">
                                           <strong>{{ $errors->first('description') }}</strong>
                                       </span>
                                   @else
                                    <textarea id="description" class="form-control" name="description">{{$post->description}}</textarea>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                               <label for="content" class="col-md-4 control-label">Conteudo</label>
                               <div class="col-md-6">
                                   @if ($errors->has('content'))
                                       <textarea id="content" class="form-control" name="content">{{ old('content') }}</textarea>
                                       <span class="help-block">
                                           <strong>{{ $errors->first('content') }}</strong>
                                       </span>
                                   @else
                                     <textarea id="content" class="form-control" name="content">{{$post->content}}</textarea>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                               <label for="image" class="col-md-4 control-label">Imagem</label>
                               <div class="col-md-6">
                                   @if ($errors->has('image'))
                                       <input type="file" class="form-control" accept="image/*" name="image" value="{{ old('image') }}">
                                       <span class="help-block">
                                           <strong>{{ $errors->first('image') }}</strong>
                                       </span>
                                   @else
                                     <input type="file" class="form-control" accept="image/*" name="image">
                                   @endif
                               </div>
                           </div>

                          <div class="form-group">
                              <div class="col-md-8 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      Salvar alterações
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
