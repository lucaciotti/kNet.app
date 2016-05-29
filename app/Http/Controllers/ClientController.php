<?php

namespace knet\Http\Controllers;

use Illuminate\Http\Request;

use knet\Http\Requests;
use knet\Client;

class ClientController extends Controller
{
    public function index (Request $req){
      $clients = Client::paginate(25);
      // dd($clients);
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
