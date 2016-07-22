<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class ClasCli extends Model
{
  protected $table = 'anagclas';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;

  // JOIN Tables
  public function client(){
    return $this->belongsTo('knet\ArcaModels\Client', 'classe', 'codice');
  }
}
