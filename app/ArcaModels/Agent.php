<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'agenti';
    public $timestamps = false;
    protected $primaryKey = 'codice';
    public $incrementing = false;

    // JOIN Tables
    public function client(){
      return $this->hasMany('knet\ArcaModels\Client', 'codice', 'agente');
    }

}
