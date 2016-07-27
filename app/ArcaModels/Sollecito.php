<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class Sollecito extends Model
{
  protected $table = 'sollec';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;
}
