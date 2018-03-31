<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller {

  public function postLogin() {
    if (Auth::attempt(array('email' => Input::get('email'),'password' => Input::get('password')))){
      return redirect('/admin');
    }
    return redirect('/');
  }

  public function getLogout() {
    Auth::logout();
    return redirect('/');
  }

}
