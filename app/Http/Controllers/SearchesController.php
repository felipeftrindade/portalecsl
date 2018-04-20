<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchesController extends Controller
{
    public function getIndex( Request $request ) {
      $s = $request->query('s');

      $posts = Post::where('title', 'like', "%$s%")
          ->orWhere('content', 'like', "%$s%")
          ->paginate(8);
      $posts->setPath('/search?s='.$s);
      return view('searches.index', ['posts' => $posts, 's' => $s ]);
    }
}
