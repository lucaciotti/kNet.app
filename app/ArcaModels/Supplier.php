<?php

namespace knet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Supplier extends Model
{
  protected $table = 'anagrafe';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;

  // Scope that garante to find only Supplier from anagrafe
  protected static function boot()
  {
      parent::boot();

      static::addGlobalScope('supplier', function(Builder $builder) {
          $builder->where('codice', 'like', 'F%');
      });
  }

  // JOIN Tables
  public function docsup(){
    return $this->hasMany('knet\DocSup', 'codicecf', 'codice');
  }

  //Multator
  // public function getDescrizionAttribute($value)
  // {
  //     return ucfirst(strtolower($value));
  // }
}
