<?php

namespace knet\Http\Controllers;

use Illuminate\Http\Request;

use knet\Http\Requests;
use knet\Client;
use knet\DocCli;

class DocCliController extends Controller
{
  public function index (Request $req, $tipomodulo=null){
    if ($tipomodulo){
      $docs = DocCli::where('tipodoc', $tipomodulo)->orderBy('datadoc', 'desc')->orderBy('id', 'desc')->paginate(25);
    } else {
      $docs = DocCli::orderBy('datadoc', 'desc')->orderBy('id', 'desc')->paginate(25);
    }
    // dd($docs);
    return view('docs.index', [
      'docs' => $docs,
    ]);
  }

  public function docCli (Request $req, $codice, $tipomodulo=null){
    if ($tipomodulo){
      $docs = DocCli::where('tipomodulo', $tipomodulo)->where('codicecf', $codice)->orderBy('datadoc', 'desc')->orderBy('id', 'desc')->paginate(25);
    } else {
      $docs = DocCli::where('codicecf', $codice)->orderBy('datadoc', 'desc')->orderBy('id', 'desc')->paginate(25);
    }
    // dd($docs);
    return view('docs.index', [
      'docs' => $docs,
      'tipomodulo' => $tipomodulo,
    ]);
  }
  
}
