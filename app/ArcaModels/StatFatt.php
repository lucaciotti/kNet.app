<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Auth;

class StatFatt extends Model
{
  protected $table = 'u_statfatt';
  public $timestamps = false;

  protected static function boot() {
    parent::boot();

    if (Auth::check()){
      if (Auth::user()->hasRole('agent')){
        static::addGlobalScope('agent', function(Builder $builder) {
            $builder->where('agente', Auth::user()->codag);
        });
      }
      if (Auth::user()->hasRole('superAgent')){
        static::addGlobalScope('superAgent', function(Builder $builder) {
          $builder->whereHas('agent', function ($query){
              $query->where('u_capoa', Auth::user()->codag);
            });
        });
      }
      if (Auth::user()->hasRole('client')){
        static::addGlobalScope('client', function(Builder $builder) {
            $builder->where('codice', Auth::user()->codcli);
        });
      }
    }
  }

  // JOIN Tables
  public function client(){
    return $this->belongsTo('knet\ArcaModels\Client', 'codicecf', 'codice');
  }

  public function agent(){
    return $this->belongsTo('knet\ArcaModels\Agent', 'agente', 'codice');
  }

  public function grpProd(){
    return $this->belongsTo('knet\ArcaModels\GrpProd', 'gruppo', 'codice');
  }
}
