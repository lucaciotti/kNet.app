<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DocCli extends Model
{
  protected $table = 'doctes';
  public $timestamps = false;
  // protected $primaryKey = 'codice';
  // public $incrementing = false;
  protected $dates = ['datadoc', 'v1data', 'datacons', 'u_dtpronto'];

  // Scope that garante to find only Supplier from anagrafe
  protected static function boot()
  {
      parent::boot();

      static::addGlobalScope('doccli', function(Builder $builder) {
          $builder->where('codicecf', 'LIKE', 'C%');
      });
  }

  // JOIN Tables
  public function client(){
    return $this->belongsTo('knet\ArcaModels\Client', 'codicecf', 'codice');
  }

  public function docrow(){
    return $this->hasMany('knet\ArcaModels\DocRow', 'id_testa', 'id');
  }

  public function agent(){
    return $this->hasOne('knet\ArcaModels\Agent', 'codice', 'agente');
  }

  public function vettore(){
    return $this->hasOne('knet\ArcaModels\Vettore', 'codice', 'vettore1');
  }

  public function detBeni(){
    return $this->hasOne('knet\ArcaModels\AspBeni', 'codice', 'aspbeni');
  }

  public function scadenza(){
    return $this->hasOne('knet\ArcaModels\Scadenza', 'id_doc', 'id');
  }

  //Multator
  // public function getDatadocAttribute($value)
  // {
  //    return $value->format('m/d/Y');
  // }

}
