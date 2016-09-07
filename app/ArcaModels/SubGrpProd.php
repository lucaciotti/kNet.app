<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SubGrpProd extends Model
{
  protected $table = 'maggrp';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;

  // JOIN Tables LEN(column_name)

  protected static function boot()
  {
    parent::boot();

    static::addGlobalScope('subGruppo', function(Builder $builder) {
        $builder->whereRaw('length(codice)>3');
      });
  }
}
