<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class StatoCf extends Model
{
  protected $table = 'staticf';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;

  // JOIN Tables
  public function client(){
    return $this->belongsTo('knet\ArcaModels\Client', 'statocf', 'codice');
  }
}
