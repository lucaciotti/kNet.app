<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
  protected $table = 'zone';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;

  // JOIN Tables
  public function client(){
    return $this->belongsTo('knet\ArcaModels\Client', 'codice', 'zona');
  }
}
