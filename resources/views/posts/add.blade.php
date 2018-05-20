@extends('layouts.admin')

@section('title')
  Nova Publicação | ECSL
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
         ],

        // without images_upload_url set, Upload tab won't show up
        images_upload_url: 'upload',

          // override default upload handler to simulate successful upload
          images_upload_handler: function (blobInfo, success, failure) {
              var xhr, formData;

              xhr = new XMLHttpRequest();
              xhr.withCredentials = false;
              xhr.open('POST', 'upload');

              xhr.onload = function() {
                  var json;

                  if (xhr.status != 200) {
                      failure('HTTP Error: ' + xhr.status);
                      return;
                  }

                  json = JSON.parse(xhr.responseText);

                  if (!json || typeof json.location != 'string') {
                      failure('Invalid JSON: ' + xhr.responseText);
                      return;
                  }

                  success(json.location);
              };

              formData = new FormData();
              formData.append('file', blobInfo.blob(), blobInfo.filename());
              formData.append('_token', '{{ csrf_token() }}');

              xhr.send(formData);
          },
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
                        <form class="form-horizontal" id="add_post" name="add_post" method="POST" action="/posts" enctype="multipart/form-data">
                           {{ csrf_field() }}

                           <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                               <label for="title" class="col-md-4 control-label">Título:</label>
                               <div class="col-md-6">
                                   <input id="title" type="text" autocomplete="off" class="form-control" name="title" value="{{ old('title') }}" required/>
                                   @if ($errors->has('title'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('title') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                               <label for="url" class="col-md-4 control-label">URL:</label>
                               <div class="col-md-6">
                                   <input id="url" type="text" autocomplete="off" class="form-control" name="url" value="{{ old('url') }}" required/>
                                   @if ($errors->has('url'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('url') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                               <label for="description" class="col-md-4 control-label">Descrição:</label>
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
                               <label for="content" class="col-md-4 control-label">Conteúdo:</label>
                               <div class="col-md-6">
                                   <textarea id="content" class="form-control" name="content">{{ old('content') }}</textarea>
                                   @if ($errors->has('content'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('content') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                          {{--
                           <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                               <label for="category_id" class="col-md-4 control-label">Categoria:</label>
                               <div class="col-md-6">
                                   <select class="form-control" name="category_id">
                                      @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                      @endforeach
                                   </select>
                                   @if ($errors->has('category_id'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('category_id') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           --}}
                           <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                               <label for="image" class="col-md-4 control-label">Imagem da Home:</label>
                               <div class="col-md-6">
                                   <input type="file" class="form-control" accept="image/*" name="image" value="{{ old('image') }}">
                                   @if ($errors->has('image'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('image') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                          <div class="form-group">
                              <div class="col-md-8 col-md-offset-4">
                                  <button type="submit" class="btn btn-success">
                                      Publicar
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
