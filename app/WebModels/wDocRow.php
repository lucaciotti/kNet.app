<?php

namespace knet\WebModels;

use Illuminate\Database\Eloquent\Model;

class wDocRow extends Model
{
    protected $table = 'w_docrig';

    protected $dates = ['dataconseg', 'u_dtpronto'];

    // JOIN Tables
    public function doccli(){
      return $this->belongsTo('knet\ArcaModels\DocCli', 'id_testa', 'id');
    }

    public function product(){
      return $this->belongsTo('knet\ArcaModels\Product', 'codicearti', 'codice');
    }
}
