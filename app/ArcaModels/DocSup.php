<?php

namespace knet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DocSup extends Model
{
  protected $table = 'doctes';
  public $timestamps = false;
  // protected $primaryKey = 'codice';
  // public $incrementing = false;

  // Scope that garante to find only Supplier from anagrafe
  protected static function boot()
  {
      parent::boot();

      static::addGlobalScope('doccli', function(Builder $builder) {
          $builder->where('codicecf', 'LIKE', 'F%');
      });
  }

  // JOIN Tables
  public function supplier(){
    return $this->belongsTo('knet\Supplier', 'codicecf', 'codice');
  }

  public function docrow(){
    return $this->hasMany('knet\DocRow', 'id_testa', 'id');
  }

}