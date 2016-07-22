<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class Nazione extends Model
{
  protected $table = 'nazioni';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;

  // JOIN Tables
  public function client(){
    return $this->belongsTo('knet\ArcaModels\Client', 'codice', 'codnazione');
  }
}
