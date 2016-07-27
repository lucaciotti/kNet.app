<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class Destinaz extends Model
{
  protected $table = 'destinaz';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;

  // JOIN Tables
  // public function docCli(){
  //   return $this->belongsTo('knet\ArcaModels\DocCli', 'codice', 'destdiv');
  // }
}
