<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class DocRow extends Model
{
  protected $table = 'docrig';
  public $timestamps = false;

  protected $dates = ['dataconseg', 'u_dtpronto'];

  // JOIN Tables
  public function doccli(){
    return $this->belongsTo('knet\ArcaModels\DocCli', 'id_testa', 'id');
  }

  public function docsup(){
    return $this->belongsTo('knet\ArcaModels\DocSup', 'id_testa', 'id');
  }

  public function product(){
    return $this->belongsTo('knet\ArcaModels\Product', 'codicearti', 'codice');
  }

}
