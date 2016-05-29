<?php

namespace knet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
  protected $table = 'magart';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;

  // Scope that garante to find only Supplier from anagrafe
  // protected static function boot()
  // {
  //     parent::boot();
  //
  //     static::addGlobalScope('Listino', function(Builder $builder) {
  //         $builder->where('u_artlis', '=', true);
  //     });
  // }

  // JOIN Tables
  public function doccli(){
    return $this->hasMany('knet\DocCli', 'codicearti', 'codice');
  }

  public function docsup(){
    return $this->hasMany('knet\DocSup', 'codicearti', 'codice');
  }

  //Multator
  // public function getDescrizionAttribute($value)
  // {
  //     return ucfirst(strtolower($value));
  // }
}
