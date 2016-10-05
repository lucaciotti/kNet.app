<?php

namespace knet\Http\Controllers;

use Illuminate\Http\Request;

use knet\Http\Requests;

use knet\ArcaModels\StatFatt;
use knet\ArcaModels\Client;
use knet\ArcaModels\Agent;

class StFattController extends Controller
{
    public function index(Request $req){
      $stFatt = StatFatt::where('codicecf', 'CTOT')->first();
      dd($stFatt);
    }
}
