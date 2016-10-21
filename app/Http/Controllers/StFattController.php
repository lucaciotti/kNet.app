<?php

namespace knet\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Collection;

use knet\Http\Requests;
use Torann\Registry\Facades\Registry;

use knet\ArcaModels\StatFatt;
use knet\ArcaModels\Client;
use knet\ArcaModels\Agent;

class StFattController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

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
                                  DB::raw('MAX(prodotto) as prodotto'),
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
                                  DB::raw('ROUND(SUM(valore12),2) as valore12'),
                                  DB::raw('ROUND(SUM(fattmese),2) as fattmese')
                                )
                          ->where('codicecf', 'CTOT')
                          ->where('agente', $agente)
                          ->whereIn('prodotto', ['KRONA', 'KOBLENZ', 'KUBIKA'])
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
      $prevMonth = (Carbon::now()->month)-1;
      $stats = $this->makeFatTgtJson($fatTot, $target, $prevMonth);
      return view('stFatt.idxAg', [
        'agents' => $agents,
        'agente' => $agente,
        'fatTot' => $fatTot,
        'fatDet' => $fatDet,
        'target' => $target,
        'stats' => $stats,
        'prevMonth' => $prevMonth,
      ]);
    }

    public function idxCli (Request $req, $codCli=null) {
      $clients = StatFatt::select('codicecf')
                          ->where('codicecf', '!=', 'CTOT')
                          ->groupBy('codicecf')
                          ->with([
                            'client' => function($query){
                              $query->select('codice', 'descrizion')
                              ->withoutGlobalScope('agent')
                              ->withoutGlobalScope('superAgent')
                              ->withoutGlobalScope('client');
                            }
                            ])
                          ->get();
      $codCli = ($req->input('codcli')) ? $req->input('codcli') : $codCli;
      $cliente = (!empty($codCli)) ? $codCli : $clients->first()->codicecf;
      $fatDet = StatFatt::select('codicecf', 'tipologia', 'gruppo',
                                  DB::raw('MAX(prodotto) as prodotto'),
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
                          ->groupBy(['codicecf', 'tipologia', 'gruppo'])
                          ->with([
                            'client' => function($query){
                              $query->select('codice', 'descrizion')
                              ->withoutGlobalScope('agent')
                              ->withoutGlobalScope('superAgent')
                              ->withoutGlobalScope('client');
                            }, 'grpProd' => function($query){
                              $query->select('codice', 'descrizion');
                            }
                            ])
                          ->get();
      $fatTot = StatFatt::select('codicecf', 'tipologia',
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
                                  DB::raw('ROUND(SUM(valore12),2) as valore12'),
                                  DB::raw('ROUND(SUM(fattmese),2) as fattmese')
                                )
                          ->where('codicecf', $cliente)
                          ->whereIn('prodotto', ['KRONA', 'KOBLENZ', 'KUBIKA'])
                          ->where('tipologia', 'FATTURATO')
                          ->groupBy(['codicecf', 'tipologia'])
                          ->with([
                            'client' => function($query){
                              $query->select('codice', 'descrizion')
                              ->withoutGlobalScope('agent')
                              ->withoutGlobalScope('superAgent')
                              ->withoutGlobalScope('client');
                            }
                            ])
                          ->get();
      $target = StatFatt::where('codicecf', $cliente)
                          ->where('tipologia', 'TARGET')
                          ->groupBy(['codicecf', 'tipologia', 'gruppo'])
                          ->with([
                            'client' => function($query){
                              $query->select('codice', 'descrizion')
                              ->withoutGlobalScope('agent')
                              ->withoutGlobalScope('superAgent')
                              ->withoutGlobalScope('client');
                            }, 'grpProd' => function($query){
                              $query->select('codice', 'descrizion');
                            }
                            ])
                          ->get();
      $prevMonth = (Carbon::now()->month)-1;
      $stats = $this->makeFatTgtJson($fatTot, $target, $prevMonth);
      // dd($stats);
      // dd($clients->first());
      return view('stFatt.idxCli', [
        'clients' => $clients,
        'cliente' => $cliente,
        'fatTot' => $fatTot,
        'fatDet' => $fatDet,
        'target' => $target,
        'stats' => $stats,
        'prevMonth' => $prevMonth,
      ]);
    }

    protected function makeFatTgtJson($fat, $tgt, $mese){
      $collect = collect([]);
      $fatM = 0;
      for($i=1; $i<=$mese; $i++){
        $valMese = 'valore' . $i;
        $fatM += $fat->isEmpty() ? 0 : $fat->first()->$valMese;
        $tgtM = $tgt->isEmpty() ? 0 : $tgt->first()->$valMese;
        $dt = Carbon::createFromDate(null, $i, null);
        $data = [
          'm' => $dt->year.'-'.$dt->month,
          'a' => $fatM,
          'b' => $tgtM
        ];
        $collect->push($data);
      }
      // dd($collect);
      return $collect->toJSON();
    }
}
