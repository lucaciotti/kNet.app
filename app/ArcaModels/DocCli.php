<?php

namespace knet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DocCli extends Model
{
  protected $table = 'doctes';
  public $timestamps = false;
  // protected $primaryKey = 'codice';
  // public $incrementing = false;
  protected $dates = ['datadoc'];

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
    return $this->belongsTo('knet\Client', 'codicecf', 'codice');
  }

  public function docrow(){
    return $this->hasMany('knet\DocRow', 'id_testa', 'id');
  }

  //Multator
  // public function getDatadocAttribute($value)
  // {
  //    return $value->format('m/d/Y');
  // }

}
