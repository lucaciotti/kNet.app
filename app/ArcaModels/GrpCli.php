<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class GrpCli extends Model
{
  protected $table = 'cligrp';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;

  // JOIN Tables
  public function client(){
    return $this->belongsTo('knet\ArcaModels\Client', 'gruppolist', 'codice');
  }
}
