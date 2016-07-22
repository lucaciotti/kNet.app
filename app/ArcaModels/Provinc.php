<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class Provinc extends Model
{
  protected $table = 'provinc';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;

  // JOIN Tables
  public function client(){
    return $this->belongsTo('knet\ArcaModels\Client', 'prov', 'codice');
  }
}
