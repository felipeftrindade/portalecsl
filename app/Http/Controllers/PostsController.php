<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Post;
use Session;
use Storage;
use Image;

class PostsController extends Controller {

    public function index() {
        $posts = Post::where('id', '>', 0)->orderBy('created_at', 'DESC')->paginate(4);
        $posts->setPath('/');
        return view('index')->with('posts',$posts);
    }

    public function listAll() {
      if(!Auth::check()){
        return redirect('/admin');
      }
      $posts = Post::where('author_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate();
      $posts->setPath('/posts');
      return view('posts.list')->with('posts',$posts);

    }

    public function show($url) {
      $post = Post::whereUrl($url)->first();

      $tags = $post->tags;
      $prev_url = Post::prevBlogPostUrl($post->id);
      $next_url = Post::nextBlogPostUrl($post->id);
      $title = $post->title;
      $description = $post->description;
      $page = 'blog';
      $data = compact('prev_url',
               'next_url',
               'tags',
               'post',
               'title',
               'description',
               'page'
             );
      return view('posts.post', $data);
    }

    public function add(){
      return view('posts.add');
    }

    public function edit($id){
      if(!Auth::check()){
        return redirect('/admin');
      }
      $post = $post = Post::find($id);
      return view('posts.edit')->with('post',$post);
    }

    public function store(Request $request) {

      $this->validate(request(), [
          'title' => 'required|unique:posts',
          'url' => 'required|unique:posts',
          'content' => 'required',
          'image' => 'required|image',
      ]);

      $post = new Post;
      $post->title = $request->input('title');
      $post->url = $request->input('url');
      $post->description = $request->input('description');
      $post->content = $request->input('content');

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . strtolower($image->getClientOriginalExtension());
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(800, 400)->save($location);
        $post->image = $filename;
      }

      $post->blog = 1;
      $post->category_id = 1;
      $post->author_id = Auth::user()->id;

      $post->save();
      Session::flash('sucess','Publicação criada com sucesso!');
      return redirect('/posts');
    }

    public function update(Request $request, Post $post){
      $this->validate(request(), [
          'title' => 'required',
          'content' => 'required',
          'image' => 'sometimes|image',
      ]);

      $post->title = $request->input('title');
      $post->description = $request->input('description');
      $post->content = $request->input('content');

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . strtolower($image->getClientOriginalExtension());
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(800, 400)->save($location);

        $oldFileName = $post->image;
        $post->image = $filename;
        Storage::delete($oldFileName);
      }

      $post->save();
      Session::flash('sucess','Publicação atualizada com sucesso.');
      return redirect('/posts');
    }

    public function delete(Request $request, $id){
      $post = Post::find($id);
      Storage::delete($post->image);
      $post->delete();
      Session::flash('sucess','Publicação excluida com sucesso!');
      return back();
    }


}
