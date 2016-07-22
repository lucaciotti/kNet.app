<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class Scadenza extends Model
{
  protected $table = 'scadenze';
  public $timestamps = false;
  // protected $primaryKey = 'codice';
  // public $incrementing = false;
  protected $dates = ['datafatt', 'datascad', 'datasollec'];
}
