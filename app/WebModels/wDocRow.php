<?php

namespace knet\WebModels;

use Illuminate\Database\Eloquent\Model;
use Torann\Registry\Facades\Registry;

class wDocRow extends Model
{
    protected $table = 'w_docrig';

    protected $dates = ['dataconseg', 'u_dtpronto'];
    protected $connection = '';

    public function __construct ($attributes = array())
    {
      parent::__construct($attributes);
      //Imposto la Connessione al Database
      // dd(Registry::get('ditta_DB'));
      $this->setConnection(Registry::get('ditta_DB'));
    }

    // JOIN Tables
    public function doccli(){
      return $this->belongsTo('knet\ArcaModels\DocCli', 'id_testa', 'id');
    }

    public function product(){
      return $this->belongsTo('knet\ArcaModels\Product', 'codicearti', 'codice');
    }
}
