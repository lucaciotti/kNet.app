<?php

namespace knet\Http\Controllers;

use Illuminate\Http\Request;

use knet\Http\Requests;
use knet\ArcaModels\Client;
use knet\ArcaModels\Nazione;
use knet\ArcaModels\Settore;
use knet\ArcaModels\Zona;
use knet\ArcaModels\Scadenza;

class ClientController extends Controller
{
    public function index (Request $req){

      $clients = Client::where('statocf', 'T')->where('agente', '!=', '');
      $clients = $clients->select('codice', 'descrizion', 'codnazione', 'agente', 'localita', 'settore');
      $clients = $clients->with(['agent']);
      $clients = $clients->get();

      $nazioni = Nazione::all();
      $settori = Settore::all();
      $zone = Zona::all();
      // $clients = $clients->paginate(25);
      // dd($clients);
      return view('client.index', [
        'clients' => $clients,
        'nazioni' => $nazioni,
        'settori' => $settori,
        'zone' => $zone,
      ]);
    }

    public function fltIndex (Request $req){
      // dd($req);
      $clients = Client::where('statocf', 'LIKE', ($req->input('optStatocf')=='' ? '%' : $req->input('optStatocf')));
      if($req->input('ragsoc')) {
        if($req->input('ragsocOp')=='eql'){
          $clients = $clients->where('descrizion', strtoupper($req->input('ragsoc')));
        }
        if($req->input('ragsocOp')=='stw'){
          $clients = $clients->where('descrizion', 'LIKE', strtoupper($req->input('ragsoc')).'%');
        }
        if($req->input('ragsocOp')=='cnt'){
          $clients = $clients->where('descrizion', 'LIKE', '%'.strtoupper($req->input('ragsoc')).'%');
        }
      }
      if($req->input('settore')) {
        $clients = $clients->whereIn('settore', $req->input('settore'));
      }
      if($req->input('nazione')) {
        $clients = $clients->whereIn('codnazione', $req->input('nazione'));
      }
      if($req->input('zona')) {
        $clients = $clients->whereIn('zona', $req->input('zona'));
      }
      $clients = $clients->where('agente', '!=', '');
      $clients = $clients->select('codice', 'descrizion', 'codnazione', 'agente', 'localita', 'settore');
      $clients = $clients->with('agent');
      $clients = $clients->get();
      // $clients = $clients->paginate(25);
      // $clients = $clients->appends($req->all());
      $nazioni = Nazione::all();
      $settori = Settore::all();
      $zone = Zona::all();

      return view('client.index', [
        'clients' => $clients,
        'nazioni' => $nazioni,
        'settori' => $settori,
        'zone' => $zone,
      ]);
    }

    public function detail (Request $req, $codCli){
      $client = Client::with(['agent', 'detNation', 'detZona', 'detSect', 'clasCli', 'detPag', 'detStato'])->findOrFail($codCli);
      $scadToPay = Scadenza::where('codcf', $codCli)->where('pagato',0)->whereIn('tipoacc', ['F', ''])->orderBy('datascad','desc')->get();
      // dd($client);
      return view('client.detail', [
        'client' => $client,
        'scads' => $scadToPay,
      ]);
    }

}
