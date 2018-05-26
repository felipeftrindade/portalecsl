<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\BlogCategory;
use Session;

class CategoriesController extends Controller
{
    public function index() {
      if(!Auth::check()){
        return redirect('/admin');
      }
      $categories = BlogCategory::where('id', '>', 0)->paginate(10);
      $categories->setPath('/categorias');
      return view('categories.add')->with('categories',$categories);
    }

    public function store(Request $request) {
      $this->validate(request(), [
          'name' => 'required|unique:blog_categories',
      ]);

      $category = new BlogCategory;
      $category->name = $request->input('name');
      $category->posts = 0;

      $category->save();
      Session::flash('sucess','Categoria criada com sucesso!');
      return redirect('/categorias');
    }
}
