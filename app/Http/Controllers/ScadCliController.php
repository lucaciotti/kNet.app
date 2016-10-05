<?php

namespace knet\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use knet\Http\Requests;
use knet\ArcaModels\ScadCli;

class ScadCliController extends Controller
{
  public function index (Request $req){
    $startDate = Carbon::now()->subMonth();
    $endDate = Carbon::now();

    $scads = ScadCli::select('id', 'id_doc', 'numfatt', 'datafatt', 'datascad', 'codcf', 'tipomod', 'tipo', 'insoluto', 'u_insoluto', 'pagato', 'impeffval', 'importopag', 'idragg', 'tipoacc');
    $scads = $scads->where('datascad', '<', Carbon::now())->where('pagato',0)->whereIn('tipoacc', ['F', '']);
    $scads = $scads->with(array('client' => function($query) {
      $query->select('codice', 'descrizion')
            ->withoutGlobalScope('agent')
            ->withoutGlobalScope('superAgent')
            ->withoutGlobalScope('client');
    }));
    $scads = $scads->orderBy('datascad', 'desc')->orderBy('id', 'desc')->get();
    // dd($scads);

    return view('scads.index', [
      'scads' => $scads,
      'startDate' => Carbon::createFromDate(2000, 1, 1),
      'endDate' => Carbon::now(),
    ]);
  }

  public function fltIndex (Request $req){
    // dd($req);
    $scads = ScadCli::select('id', 'id_doc', 'numfatt', 'datafatt', 'datascad', 'codcf', 'tipomod', 'tipo', 'insoluto', 'u_insoluto', 'pagato', 'impeffval', 'importopag', 'idragg', 'tipoacc');
    $scads = $scads->whereIn('tipoacc', [$req->input('optRaggr'), '']);
    $scads = $scads->whereIn('tipo', $req->input('chkPag'));
    if($req->input('startDate') && $req->input('noDate')!='C'){
      $startDate = Carbon::createFromFormat('d/m/Y',$req->input('startDate'));
      $endDate = Carbon::createFromFormat('d/m/Y',$req->input('endDate'));
      $scads = $scads->whereBetween('datascad', [$startDate, $endDate]);
    } else {
      $startDate = null;
      $endDate = null;
    }
    if($req->input('ragsoc')) {
      $ragsoc = strtoupper($req->input('ragsoc'));
      if($req->input('ragsocOp')=='eql'){
        $scads = $scads->whereHas(array('client' => function($query) use ($ragsoc) {
          $query->where('descrizion', $ragsoc)
                ->withoutGlobalScope('agent')
                ->withoutGlobalScope('superAgent')
                ->withoutGlobalScope('client');
        }));
      }
      if($req->input('ragsocOp')=='stw'){
        $scads = $scads->whereHas(array('client' => function($query) use ($ragsoc){
          $query->where('descrizion', 'LIKE', $ragsoc.'%')
                ->withoutGlobalScope('agent')
                ->withoutGlobalScope('superAgent')
                ->withoutGlobalScope('client');
        }));
      }
      if($req->input('ragsocOp')=='cnt'){
        $scads = $scads->whereHas('client', function ($query) use ($ragsoc){
          $query->where('descrizion', 'like', '%'.$ragsoc.'%')
                ->withoutGlobalScope('agent')
                ->withoutGlobalScope('superAgent')
                ->withoutGlobalScope('client');
        });
      }
    }
    if($req->input('chkStato_T')!='T'){
      $scads = ($req->input('chkStato_P')=='P') ? $scads->where('pagato',1) : $scads->where('pagato',0);
    }

    $scads = $scads->with(array('client' => function($query) {
      $query->select('codice', 'descrizion')
            ->withoutGlobalScope('agent')
            ->withoutGlobalScope('superAgent')
            ->withoutGlobalScope('client');
    }));
    $scads = $scads->orderBy('datascad', 'desc')->orderBy('id', 'desc')->get();

    return view('scads.index', [
      'scads' => $scads,
      'ragSoc' => $req->input('ragsoc'),
      'startDate' => $startDate,
      'endDate' => $endDate,
      'chkStato_T' => $req->input('chkStato_T'),
      'chkStato_P' => $req->input('chkStato_P'),
      'optRaggr' => $req->input('optRaggr'),
      'chkPag' => $req->input('chkPag'),
    ]);
  }

  public function showDetail (Request $req, $id){
    $scad = ScadCli::findOrFail($id);
    // dd($nextDocs);
    return view('scad.detail', [
      'scad' => $scad,
    ]);
  }
}
