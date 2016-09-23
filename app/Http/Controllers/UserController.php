<?php

namespace knet\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use knet\Http\Requests;
use knet\User;
use knet\Role;
use knet\ArcaModels\Client;
use knet\ArcaModels\Agent;

class UserController extends Controller
{
    public function index(Request $req){
      $users = User::with(['roles', 'client', 'agent'])->orderBy('id')->get();
      // dd($users);
      return view('user.index', [
        'users' => $users,
      ]);
    }

    public function destroy(Request $req, $id){
      User::destroy($id);
      return Redirect::route('user::users.index');
    }

    public function edit(Request $req, $id){
      $user=User::with('roles')->findOrFail($id);
      $roles = Role::all();
      $clients = Client::select('codice', 'descrizion')
                  ->withoutGlobalScope('agent')
                  ->withoutGlobalScope('superAgent')
                  ->withoutGlobalScope('client')->get();
      $agents = Agent::select('codice', 'descrizion')->get();
      // dd($user->roles->contains(33));
      return view('user.edit', [
        'user' => $user,
        'roles' => $roles,
        'clients' => $clients,
        'agents' => $agents,
      ]);
    }

    public function update(Request $req, $id){
      // dd($req->input());
      $user = User::findOrFail($id);

      $user->roles()->detach();
      $user->attachRole($req->input('role'));

      $user->name = $req->input('name');
      $user->email = $req->input('email');
      $user->codag = $req->input('codag');
      $user->codcli = $req->input('codcli');
      $user->save();


      return Redirect::route('user::users.index');
    }
}
