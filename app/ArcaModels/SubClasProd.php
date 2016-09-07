<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SubClasProd extends Model
{
  protected $table = 'magcls';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;

  // JOIN Tables LEN(column_name)

  protected static function boot()
  {
    parent::boot();

    static::addGlobalScope('subClasse', function(Builder $builder) {
        $builder->whereRaw('length(codice)>3');
    });
  }
}
