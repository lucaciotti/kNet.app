<?php

namespace knet\Http\Controllers;

use Illuminate\Http\Request;

use knet\Http\Requests;
use knet\ArcaModels\Client;
use knet\ArcaModels\DocCli;
use knet\ArcaModels\DocRow;

class DocCliController extends Controller
{
  public function index (Request $req, $tipomodulo=null){
    $docs = DocCli::select('id', 'tipodoc', 'numerodoc', 'datadoc', 'codicecf', 'numerodocf', 'numrighepr', 'totdoc');
    if ($tipomodulo){
      $docs = $docs->where('tipomodulo', $tipomodulo);
    }
    $docs = $docs->orderBy('datadoc', 'desc')->orderBy('id', 'desc')->get();
    // dd($docs);

    $descModulo = ($tipomodulo == 'O' ? 'Ordini' : ($tipomodulo == 'B' ? 'Bolle' : ($tipomodulo == 'F' ? 'Fatture' : $tipomodulo)));

    return view('docs.index', [
      'docs' => $docs,
      'tipomodulo' => $tipomodulo,
      'descModulo' => $descModulo,
    ]);
  }

  public function docCli (Request $req, $codice, $tipomodulo=null){
    $docs = DocCli::select('id', 'tipodoc', 'numerodoc', 'datadoc', 'codicecf', 'numerodocf', 'numrighepr', 'totdoc');
    if ($tipomodulo){
      $docs = $docs->where('tipomodulo', $tipomodulo)->where('codicecf', $codice);
    } else {
      $docs = $docs->where('codicecf', $codice);
    }
    $docs = $docs->orderBy('datadoc', 'desc')->orderBy('id', 'desc')->get();

    $client = Client::select('codice', 'descrizion')->findOrFail($codice);

    $descModulo = ($tipomodulo == 'O' ? 'Ordini' : ($tipomodulo == 'B' ? 'Bolle' : ($tipomodulo == 'F' ? 'Fatture' : 'Documenti')));

    // dd($docs);
    return view('docs.indexCli', [
      'docs' => $docs,
      'tipomodulo' => $tipomodulo,
      'descModulo' => $descModulo,
      'client' => $client,
      'codicecf' => $codice,
    ]);
  }

  public function showDetail (Request $req, $id_testa){
    $tipoDoc = DocCli::select('tipomodulo')->findOrFail($id_testa);
    $head = DocCli::with('client');
    if ($tipoDoc->tipomodulo=='F'){
        $head = $head->with('scadenza');
    } elseif ($tipoDoc->tipomodulo=='B') {
        $head = $head->with('vettore', 'detBeni');
    }
    $head = $head->findOrFail($id_testa);
    $rows = DocRow::where('id_testa', $id_testa)->orderBy('numeroriga', 'asc')->get();
    $prevIds = DocRow::distinct('riffromt')->where('id_testa', $id_testa)->where('riffromt', '!=', 0)->get();
    $prevDocs = DocCli::select('id', 'tipodoc', 'numerodoc', 'datadoc')->whereIn('id', $prevIds->pluck('riffromt'))->get();
    $nextIds = DocRow::distinct('id_testa')->where('riffromt', $id_testa)->get();
    $nextDocs = DocCli::select('id', 'tipodoc', 'numerodoc', 'datadoc')->whereIn('id', $nextIds->pluck('id_testa'))->get();
    // dd($nextDocs);
    return view('docs.detail', [
      'head' => $head,
      'rows' => $rows,
      'prevDocs' => $prevDocs,
      'nextDocs' => $nextDocs,
    ]);
  }

}
