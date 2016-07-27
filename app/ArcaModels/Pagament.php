<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class Pagament extends Model
{
  protected $table = 'pagament';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;

  // JOIN Tables
  public function client(){
    return $this->belongsTo('knet\ArcaModels\Client', 'pag', 'codice');
  }

  public function scadenza(){
    return $this->belongsTo('knet\ArcaModels\Scadenza', 'codpag', 'codice');
  }
}
