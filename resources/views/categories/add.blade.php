@extends('layouts.admin')

@section('title')
  Nova Categoria | ECSL
@endsection

@section('content')
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">Nova Categoria</div>
                      <div class="panel-body">
                        <form class="form-horizontal" id="add_categoria" name="add_categoria" method="POST" action="/categorias" enctype="multipart/form-data">
                           {{ csrf_field() }}

                           <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                               <label for="title" class="col-md-4 control-label">Categoria:</label>
                               <div class="col-md-6">
                                   <input id="name" type="text" autocomplete="off" class="form-control" name="name" value="{{ old('name') }}" required/>
                                   @if ($errors->has('name'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('name') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                          <div class="form-group">
                              <div class="col-md-8 col-md-offset-4">
                                  <button type="submit" class="btn btn-success">
                                      Adicionar
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
