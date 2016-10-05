<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class StatFatt extends Model
{
  protected $table = 'u_statfatt';
  public $timestamps = false;

  // JOIN Tables
  public function client(){
    return $this->belongsTo('knet\ArcaModels\Client', 'codicecf', 'codice');
  }

  public function agent(){
    return $this->belongsTo('knet\ArcaModels\Agent', 'agente', 'codice');
  }
}
