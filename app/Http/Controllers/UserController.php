<?php

namespace knet\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Excel;
use Illuminate\Support\Facades\Input;
use Session;
use knet\Jobs\ImportUsersExcel;

use knet\Http\Requests;
use Auth;
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

    public function showImport(Request $req){
      return view('user.import');
    }

    public function doImport(Request $req){
      $destinationPath = 'usersFiles'; // upload path
      $extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
      $fileName = rand(11111,99999).'.'.$extension; // renameing image
      Input::file('file')->move($destinationPath, $fileName); // uploading file to given path
      // sending back with message
      Session::flash('success', 'Upload successfully');
      $this->dispatch(new ImportUsersExcel($fileName));
      return Redirect::back();

      // $rows = Excel::load($req->file('file'), function($reader) {})->all();
      // $roleClient = Role::where('name', 'client')->first();
      // $roleAgent = Role::where('name', 'agent')->first();
      // foreach ($rows as $row) {
  		// 	    // dd($row);
      //       if(!empty($row->email) && in_array($row->ruolo, ['A', 'C']) and strpos($row->email,"@")>0){
      //         $user = User::where("email", $row->email)->first();
      //         if($user==null){
      //           $user = User::create([
      //             'name'  => $row->nome,
      //             'email' => $row->email,
      //             'password' => bcrypt($row->password),
      //           ]);
      //         }
      //         $user->roles()->detach();
      //         if($row->ruolo == 'C'){
      //           $user->codcli = $row->codice;
      //           $user->attachRole($roleClient->id);
      //         } elseif($row->ruolo == 'A'){
      //           $user->codag = $row->codice;
      //           $user->attachRole($roleAgent->id);
      //         }
      //       $user->save();
      //       // dd($user);
      //     }
			// }
      // return Redirect::route('user::users.index');
    }

    public function actLike(Request $req, $id){
      Auth::loginUsingId($id);
      return redirect()->action('HomeController@index');
    }
}
