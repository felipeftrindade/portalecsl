<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogCategory;

class CategoriesController extends Controller
{
    public function index() {
      if(!Auth::check()){
        return redirect('/admin');
      }
      return view('categories.add');
    }

    public function store(Request $request) {
      $this->validate(request(), [
          'name' => 'required|unique:blog_categories',
      ]);

      $category = new BlogCategory;
      $category->name = $request->input('name');

      $category->save();
      Session::flash('sucess','Categoria criada com sucesso!');
      return redirect('/categorias');
    }
}
