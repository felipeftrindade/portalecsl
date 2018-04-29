@extends('layouts.admin')

@section('title')
  Publicações | ECSL
@endsection

@section('content')
      <div class="container">
          <div class="row">
              @if(session()->has('sucess'))
                <div class="alert alert-success">
                    {{ session()->get('sucess') }}
                </div>
                @endif
                <h4>Últimas Publicações</h4>
                  <div class="panel panel-default">
                      <table class="table table-sm" style="font-size: 14px;">
                        <thead>
                          <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descrição</th>
                            <th class="text-center" scope="col">Criado em</th>
                            <th class="text-center" scope="col">Atualizado em</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($posts as $post)
                            <tr>
                              <td class="truncate-ellipsis"><span>{{$post->title}}</span></td>
                              <td class="truncate-ellipsis"><span>{!!$post->description!!}</span></td>
                              <td class="text-center">{{date('d/m/Y H:i', strtotime($post->created_at))}}</td>
                              <td class="text-center">
                                @if ($post->updated_at !== null && $post->updated_at > $post->created_at)
                                  {{date('d/m/Y H:i', strtotime($post->updated_at))}}
                                @else
                                  -
                                @endif
                              </td>
                              <td>
                                <ul>
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                          Opções <span class="caret"></span>
                                      </a>

                                      <ul class="dropdown-menu" role="menu">
                                          <li>
                                              <a target="_blank" href="{{'/'.$post->url}}">Visualizar</a>
                                              <a href="{{'/posts/'.$post->id.'/edit'}}">Editar</a>

                                              <a href="#"
                                                  onclick="event.preventDefault();
                                                           document.getElementById('delete-form{{$post->id}}').submit();">
                                                  Apagar
                                              </a>
                                              <form id="delete-form{{$post->id}}" action="/posts/{{$post->id}}" method="POST" style="display: none;">
                                                  {{ csrf_field() }}
                                                  {{ method_field('DELETE') }}
                                              </form>
                                          </li>
                                      </ul>
                                  </li>
                                </ul>
                             </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="col-md-12">
        								<div class="post-pagination">
        									{{$posts->links()}}
        								</div>
        							</div>
                  </div>
          </div>
      </div>
@endsection
