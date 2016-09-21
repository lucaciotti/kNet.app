<?php

namespace knet\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use knet\Http\Requests;
use knet\User;

class UserController extends Controller
{
    public function index(Request $req){
      $users = User::with('roles')->orderBy('id')->get();
      // dd($users);
      return view('user.index', [
        'users' => $users,
      ]);
    }

    public function destroy(Request $req, $id){
      User::destroy($id);
      return Redirect::route('user::users.index');
    }
}
