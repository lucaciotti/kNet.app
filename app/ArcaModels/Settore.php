<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class Settore extends Model
{
    protected $table = 'settori';
    public $timestamps = false;
    protected $primaryKey = 'codice';
    public $incrementing = false;

    // JOIN Tables
    public function client(){
      return $this->belongsTo('knet\ArcaModels\Client', 'codice', 'settore');
    }
}
