<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;

class UsersController extends Controller {

  public function getLogin() {
    if(Auth::check()){
      return redirect('/posts');
    }
    return view('admin.login');
  }

  public function postLogin() {
    if (!Auth::attempt(array('email' => Input::get('email'),'password' => Input::get('password')))){
      $errors = new MessageBag(['password' => ['Usuário e/ou senha incorretos.']]);
      return back()->withErrors($errors)->withInput(Input::except('password'));
    }
    return redirect('/posts');
  }

  public function getLogout() {
    Auth::logout();
    return redirect('/admin');
  }

}
