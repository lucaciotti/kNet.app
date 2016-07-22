<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class AspBeni extends Model
{
  protected $table = 'aspbeni';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;

  // JOIN Tables
  public function docCli(){
    return $this->belongsTo('knet\ArcaModels\DocCli', 'codice', 'aspbeni');
  }
}
