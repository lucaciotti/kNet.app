<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class CreditStr extends Model
{
  protected $table = 'crediti_st';
  public $timestamps = false;
  // protected $primaryKey = 'codice';
  // public $incrementing = false;
  protected $dates = ['datareg'];

  public function scadenza(){
    return $this->belongsToMany('knet\ArcaModels\ScadCli', 'u_scadcre', 'id_crediti', 'id_scad', 'id', 'id');
  }
}
