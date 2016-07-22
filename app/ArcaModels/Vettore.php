<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class Vettore extends Model
{
  protected $table = 'vettori';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;

  // JOIN Tables
  public function docCli(){
    return $this->belongsTo('knet\ArcaModels\DocCli', 'codice', 'vettore1');
  }
}
