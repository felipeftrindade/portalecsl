<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\BlogCategory;

class SearchesController extends Controller
{
    public function getIndex( Request $request ) {
      $s = $request->query('s');
      $categoria = $request->query('categoria');
      if ($s != ''){
        $posts = Post::where('title', 'like', "%$s%")
            ->orWhere('content', 'like', "%$s%")
            ->paginate(8);
        $posts->setPath('/search?s='.$s);
      } else if ($categoria != '') {
        $cat_name = BlogCategory::find($categoria);
        if ($cat_name != null){
          $s = $cat_name->name;
        }
        $posts = Post::where('category_id', '=', $categoria)->paginate(8);
        $posts->setPath('/search?categoria='.$categoria);
      }
      $categories = BlogCategory::where('posts', '>', 0)->take(5)->orderBy('posts', 'DESC')->get();
      return view('searches.index', ['posts' => $posts, 's' => $s, 'categories' => $categories ]);
    }
}
