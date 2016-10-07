<?php

namespace knet\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
      $codAg = ($req->input('codag')) ? $req->input('codag') : $codAg;
      $agente = (!empty($codAg)) ? $codAg : $agents->first()->agente;
      $fatDet = StatFatt::select('agente', 'tipologia', 'gruppo',
                                  DB::raw('MAX(LEFT(gruppo,1)) as grp'),
                                  DB::raw('SUM(valore1) as valore1'),
                                  DB::raw('SUM(valore2) as valore2'),
                                  DB::raw('SUM(valore3) as valore3'),
                                  DB::raw('SUM(valore4) as valore4'),
                                  DB::raw('SUM(valore5) as valore5'),
                                  DB::raw('SUM(valore6) as valore6'),
                                  DB::raw('SUM(valore7) as valore7'),
                                  DB::raw('SUM(valore8) as valore8'),
                                  DB::raw('SUM(valore9) as valore9'),
                                  DB::raw('SUM(valore10) as valore10'),
                                  DB::raw('SUM(valore11) as valore11'),
                                  DB::raw('SUM(valore12) as valore12')
                                )
                          ->where('codicecf', 'CTOT')
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
      $fatTot = StatFatt::select('agente', 'tipologia',
                                  DB::raw('ROUND(SUM(valore1),2) as valore1'),
                                  DB::raw('ROUND(SUM(valore2),2) as valore2'),
                                  DB::raw('ROUND(SUM(valore3),2) as valore3'),
                                  DB::raw('ROUND(SUM(valore4),2) as valore4'),
                                  DB::raw('ROUND(SUM(valore5),2) as valore5'),
                                  DB::raw('ROUND(SUM(valore6),2) as valore6'),
                                  DB::raw('ROUND(SUM(valore7),2) as valore7'),
                                  DB::raw('ROUND(SUM(valore8),2) as valore8'),
                                  DB::raw('ROUND(SUM(valore9),2) as valore9'),
                                  DB::raw('ROUND(SUM(valore10),2) as valore10'),
                                  DB::raw('ROUND(SUM(valore11),2) as valore11'),
                                  DB::raw('ROUND(SUM(valore12),2) as valore12')
                                )
                          ->where('codicecf', 'CTOT')
                          ->where('agente', $agente)
                          ->where('tipologia', 'FATTURATO')
                          ->groupBy(['agente', 'tipologia'])
                          ->with([
                            'agent' => function($query){
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
      // dd($fatDet->where('gruppo', 'A06'));
      return view('stFatt.idxAg', [
        'agents' => $agents,
        'agente' => $agente,
        'fatTot' => $fatTot,
        'fatDet' => $fatDet,
        'target' => $target,
      ]);
    }

    public function idxCli (Request $req, $codCli=null) {
      $clients = StatFatt::select('codicecf')
                          ->where('codicecf', '!=', 'CTOT')
                          ->groupBy('codicecf')
                          ->with([
                            'client' => function($query){
                              $query->select('codice', 'descrizion');
                            }
                            ])
                          ->get();
      $codCli = ($req->input('codcli')) ? $req->input('codcli') : $codCli;
      $cliente = (!empty($codCli)) ? $codCli : $clients->first()->codicecf;
      $fatDet = StatFatt::select('agente', 'tipologia', 'gruppo',
                                  DB::raw('MAX(LEFT(gruppo,1)) as grp'),
                                  DB::raw('SUM(valore1) as valore1'),
                                  DB::raw('SUM(valore2) as valore2'),
                                  DB::raw('SUM(valore3) as valore3'),
                                  DB::raw('SUM(valore4) as valore4'),
                                  DB::raw('SUM(valore5) as valore5'),
                                  DB::raw('SUM(valore6) as valore6'),
                                  DB::raw('SUM(valore7) as valore7'),
                                  DB::raw('SUM(valore8) as valore8'),
                                  DB::raw('SUM(valore9) as valore9'),
                                  DB::raw('SUM(valore10) as valore10'),
                                  DB::raw('SUM(valore11) as valore11'),
                                  DB::raw('SUM(valore12) as valore12')
                                )
                          ->where('codicecf', $cliente)
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
      $fatTot = StatFatt::select('agente', 'tipologia',
                                  DB::raw('ROUND(SUM(valore1),2) as valore1'),
                                  DB::raw('ROUND(SUM(valore2),2) as valore2'),
                                  DB::raw('ROUND(SUM(valore3),2) as valore3'),
                                  DB::raw('ROUND(SUM(valore4),2) as valore4'),
                                  DB::raw('ROUND(SUM(valore5),2) as valore5'),
                                  DB::raw('ROUND(SUM(valore6),2) as valore6'),
                                  DB::raw('ROUND(SUM(valore7),2) as valore7'),
                                  DB::raw('ROUND(SUM(valore8),2) as valore8'),
                                  DB::raw('ROUND(SUM(valore9),2) as valore9'),
                                  DB::raw('ROUND(SUM(valore10),2) as valore10'),
                                  DB::raw('ROUND(SUM(valore11),2) as valore11'),
                                  DB::raw('ROUND(SUM(valore12),2) as valore12')
                                )
                          ->where('codicecf', 'CTOT')
                          ->where('codicecf', $cliente)
                          ->where('tipologia', 'FATTURATO')
                          ->groupBy(['agente', 'tipologia'])
                          ->with([
                            'agent' => function($query){
                              $query->select('codice', 'descrizion');
                            }
                            ])
                          ->get();
      $target = StatFatt::where('codicecf', $cliente)
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
      // dd($fatDet->where('gruppo', 'A06'));
      return view('stFatt.idxAg', [
        'agents' => $clients,
        'agente' => $cliente,
        'fatTot' => $fatTot,
        'fatDet' => $fatDet,
        'target' => $target,
      ]);
    }

}
