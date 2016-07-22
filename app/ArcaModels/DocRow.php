<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class DocRow extends Model
{
  protected $table = 'docrig';
  public $timestamps = false;

  // JOIN Tables
  public function doccli(){
    return $this->belongsTo('knet\DocCli', 'id_testa', 'id');
  }

  public function docsup(){
    return $this->belongsTo('knet\DocSup', 'id_testa', 'id');
  }

  public function product(){
    return $this->belongsTo('knet\Product', 'codicearti', 'codice');
  }

}
