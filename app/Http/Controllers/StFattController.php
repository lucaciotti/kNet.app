<?php

namespace knet\Http\Controllers;

use Illuminate\Http\Request;

use knet\Http\Requests;

use knet\ArcaModels\StatFatt;
use knet\ArcaModels\Client;
use knet\ArcaModels\Agent;

class StFattController extends Controller
{
    public function idxAg (Request $req, $codAg=null) {
      $agents = StatFatt::select('agente')
                          ->where('agente', '!=', '00')
                          ->groupBy('agente')
                          ->with([
                            'agent' => function($query){
                              $query->select('codice', 'descrizion');
                            }
                            ])
                          ->get();
      $agente = (!empty($codAg)) ? $codAg : $agents->first()->agente;
      $fatturato = StatFatt::where('codicecf', 'CTOT')
                          ->where('agente', $agente)
                          ->where('tipologia', 'FATTURATO')
                          ->groupBy(['agente', 'tipologia', 'gruppo'])
                          ->with([
                            'agent' => function($query){
                              $query->select('codice', 'descrizion');
                            }, 'grpProd' => function($query){
                              $query->select('codice', 'descrizion');
                            }
                            ])
                          ->get();
      $target = StatFatt::where('codicecf', 'CTOT')
                          ->where('agente', $agente)
                          ->where('tipologia', 'TARGET')
                          ->groupBy(['agente', 'tipologia', 'gruppo'])
                          ->with([
                            'agent' => function($query){
                              $query->select('codice', 'descrizion');
                            }, 'grpProd' => function($query){
                              $query->select('codice', 'descrizion');
                            }
                            ])
                          ->get();
      // dd($target);
      return view('stFatt.idxAg', [
        'agents' => $agents,
        'agente' => $agente,
        'fatturato' => $fatturato,
        'target' => $target,
      ]);
    }

    public function idxCli (Request $req, $codCli) {

      $stFatt = StatFatt::where('codicecf', 'CTOT')->first();
      dd($stFatt);
    }

}
