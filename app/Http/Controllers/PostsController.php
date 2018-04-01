<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Post;

class PostsController extends Controller {

    public function getIndex() {
      $posts = Post::with('Author')-> orderBy('id', 'DESC')->get();
      return view('welcome')->with('posts',$posts);
    }

    public function getAdmin() {
      return view('addpost');
    }

    public function postAdd() {
      Post::create(array(
                  'title' => Input::get('title'),
                  'content' => Input::get('content'),
                  'author_id' => Auth::user()->id
       ));
      return redirect('/');
    }

}
