<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Post;

class PostsController extends Controller {

    public function blog() {
        $posts = Post::where('id', '>', 0)->orderBy('created_at', 'DESC')->paginate(4);
        //$posts = Post::with('Author')->orderBy('created_at', 'DESC')->get()->paginate(4);
        $posts->setPath('/');
        //$data['posts'] = $posts;

        return view('welcome')->with('posts',$posts);
      /*  return view('blog', array('data' => $data,
          'title' => 'Latest Blog Posts',
          'description' => '',
          'page' => 'blog')); */
    }

    public function blog_post($url) {
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

    public function getIndex() {
      $posts = Post::with('Author')-> orderBy('id', 'DESC')->get();
      return view('welcome')->with('posts',$posts);
    }

    public function getAdmin() {
      return view('posts.addpost');
    }

    public function postAdd() {

      $this->validate(request(), [
          'title' => 'required|unique:posts',
          'url' => 'required|unique:posts',
          'content' => 'required',
      ]);

      Post::create(array(
                  'title' => Input::get('title'),
                  'url' => Input::get('url'),
                  'description' => Input::get('description'),
                  'content' => Input::get('content'),
                  'image' => Input::get('image'),
                  'blog' => 1,
                  'category_id' => 1,
                  'author_id' => Auth::user()->id,
       ));

      return redirect('/');
    }

}
