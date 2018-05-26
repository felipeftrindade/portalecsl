<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use App\BlogCategory;
use App\Post;
use Session;
use Storage;
use Image;
use Purifier;

class PostsController extends Controller {

    public function index() {
        $posts = Post::where('id', '>', 0)->orderBy('created_at', 'DESC')->paginate(4);
        $posts->setPath('/');

        $categories = BlogCategory::where('posts', '>', 0)->take(5)->orderBy('posts', 'DESC')->get();
        return view('index', ['posts' => $posts, 'categories' => $categories ]);
        //return view('index')->with('posts',$posts);
    }

    public function listAll() {
      if(!Auth::check()){
        return redirect('/admin');
      }
      $posts = Post::where('author_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);
      $posts->setPath('/posts');
      return view('posts.list')->with('posts',$posts);

    }

    public function show($url) {
      $post = Post::whereUrl($url)->first();
      $categories = BlogCategory::where('posts', '>', 0)->take(5)->orderBy('posts', 'DESC')->get();
      return view('posts.post',['post' => $post, 'categories' => $categories ]);
    }

    public function add(){
      $categories = BlogCategory::orderBy('name')->get();
      return view('posts.add')->with('categories',$categories);
    }

    public function edit($id){
      if(!Auth::check()){
        return redirect('/admin');
      }
      $post = Post::find($id);
      $categories = BlogCategory::orderBy('name')->get();
      return view('posts.edit', ['post' => $post, 'categories' => $categories ]);
    }

    public function store(Request $request) {

      $this->validate(request(), [
          'title' => 'required|unique:posts',
          'url' => 'required|unique:posts',
          'description' => 'required',
          'content' => 'required',
          'image' => 'sometimes|image',
      ]);

      $post = new Post;
      $post->title = $request->input('title');
      $post->url = $request->input('url');
      $post->description = $request->input('description');
      $post->content = Purifier::clean($request->input('content'));

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . strtolower($image->getClientOriginalExtension());
        $post->image = $this->uploadImage($filename, $image, false);
      } else {
        $post->image = "images/logo.png";
      }

      $post->blog = 1;
      $post->category_id = $request->input('category_id');
      $post->author_id = Auth::user()->id;

      $post->save();

      DB::table('blog_categories')->whereId($post->category_id)->increment('posts');

      Session::flash('sucess','Publicação criada com sucesso!');
      return redirect('/posts');
    }

    public function update(Request $request, Post $post){
      $this->validate(request(), [
          'title' => 'required',
          'description' => 'required',
          'content' => 'required',
          'image' => 'sometimes|image',
      ]);

      $post->title = $request->input('title');
      $post->description = $request->input('description');
      $post->content = Purifier::clean($request->input('content'));
      $post->category_id = $request->input('category_id');

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . strtolower($image->getClientOriginalExtension());
        $post->image = $this->uploadImage($filename, $image, false);
      }
      $post->save();
      Session::flash('sucess','Publicação atualizada com sucesso.');
      return redirect('/posts');
    }

    public function delete(Request $request, $id){
      $post = Post::find($id);
      $post->delete();

      DB::table('blog_categories')->whereId($post->category_id)->decrement('posts');

      Session::flash('sucess','Publicação excluida com sucesso!');
      return back();
    }

    public function upload(Request $request){
      $this->validate(request(), [
          'file' => 'required|image',
      ]);

      $image = $request->file('file');
      $filename = time() . '.' . strtolower($image->getClientOriginalExtension());
      $path = $this->uploadImage($filename, $image, true);
      header('Access-Control-Allow-Origin: *');
      return response()->json(array('location' => $path));
    }

    public function uploadImage($filename, $image, $isWYSIWYG){
      if (!App::environment('local')){
        Storage::disk('s3')->put('images/'.$filename, file_get_contents($image), 'public');
        return 'https://s3.us-east-2.amazonaws.com/portalecsl-assets/images/'.$filename;
      }
      $location = public_path('images/' . $filename);
      Image::make($image)->save($location);
      if ($isWYSIWYG){
        return '../images/'.$filename;
      }
      return 'images/' . $filename;
    }

}
