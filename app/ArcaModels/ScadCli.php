<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ScadCli extends Model
{
  protected $table = 'scadenze';
  public $timestamps = false;
  // protected $primaryKey = 'codice';
  // public $incrementing = false;
  protected $dates = ['datafatt', 'datascad', 'datasollec'];

  // Scope that garante to find only Client from anagrafe
  protected static function boot()
  {
      parent::boot();

      static::addGlobalScope('scadClient', function(Builder $builder) {
          $builder->where('codcf', 'like', 'C%');
      });
  }

  public function client(){
    return $this->belongsTo('knet\ArcaModels\Client', 'codcf', 'codice');
  }

  public function docCli(){
    return $this->belongsTo('knet\ArcaModels\DocCli', 'id_doc', 'id');
  }

  public function pagament(){
    return $this->hasOne('knet\ArcaModels\Pagament', 'codice', 'codpag');
  }

  public function detSollec(){
    return $this->hasOne('knet\ArcaModels\Sollecito', 'codice', 'sollecito');
  }

  public function agent(){
    return $this->belongsTo('knet\ArcaModels\Agent', 'codag', 'codice');
  }

  public function storia(){
    return $this->belongsToMany('knet\ArcaModels\CreditStr', 'u_scadcre', 'id_scad', 'id_crediti', 'id', 'id');
  }
}
