<?php

namespace knet\Http\Controllers;

use Illuminate\Http\Request;

use knet\Http\Requests;
use knet\ArcaModels\DocRow;

class DocRowController extends Controller
{
  public function show (Request $req, $id_testa){

    $rows = DocRow::where('id_testa', $id_testa)->orderBy('numeroriga', 'asc')->get();
    // dd($rows);
    return view('docs.rows', [
      'rows' => $rows,
    ]);
  }
}
