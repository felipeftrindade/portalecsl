<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Article;

class ArticleController extends Controller {

    public function getIndex() {
      $posts = Article::with('Author')-> orderBy('id', 'DESC')->get();
      return view('index')->with('posts',$posts);
    }

    public function getAdmin() {
      return view('addpost');
    }

    public function postAdd() {
      Article::create(array(
                  'title' => Input::get('title'),
                  'content' => Input::get('content'),
                  'author_id' => Auth::user()->id
       ));
      return redirect('/');
    }

}
