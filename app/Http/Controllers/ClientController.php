<?php

namespace knet\Http\Controllers;

use Illuminate\Http\Request;

use knet\Http\Requests;
use knet\Client;

class ClientController extends Controller
{
    public function index (Request $req){

      $clients = Client::where('statocf', 'T')->paginate(25);
      // dd($clients);
      return view('client.index', [
        'clients' => $clients,
      ]);
    }

    public function fltIndex (Request $req){
      // dd($req->input());
      $clients = Client::where('statocf', 'LIKE', ($req->input('optStatocf')=='' ? '%' : $req->input('optStatocf')));

      if($req->input('ragsoc')) {
        if($req->input('ragsocOp')=='eql'){
          $clients = $clients->where('descrizion', $req->input('ragsoc'));
        }
        if($req->input('ragsocOp')=='stw'){
          $clients = $clients->where('descrizion', 'LIKE', $req->input('ragsoc').'%');
        }
        if($req->input('ragsocOp')=='cnt'){
          $clients = $clients->where('descrizion', 'LIKE', '%'.$req->input('ragsoc').'%');
        }
      }

      if($req->input('settore')) {
        $clients = $clients->whereOr('settore', $req->input('settore'));
      }

      $clients = $clients->paginate(25);

      return view('client.index', [
        'clients' => $clients,
      ]);
    }

    public function detail (Request $req, $codCli){
      $client = Client::findOrFail($codCli);
      // dd($client);
      return view('client.detail', [
        'client' => $client,
      ]);
    }

}
