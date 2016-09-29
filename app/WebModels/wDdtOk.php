<?php

namespace knet\WebModels;

use Illuminate\Database\Eloquent\Model;

class wDdtOk extends Model
{
  protected $table = 'w_ddtok';
  protected $dates = ['created_at', 'updated_at'];

  // JOIN Tables
  public function doccli(){
    return $this->belongsTo('knet\ArcaModels\DocCli', 'id_testa', 'id');
  }
}
