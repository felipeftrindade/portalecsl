<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller {

  public function postLogin() {
    Auth::attempt(array('email' => Input::get('email'),'password' => Input::get('password')));
    return view('posts.addpost');
  }

  public function getLogout() {
    Auth::logout();
    return redirect('/');
  }

}
