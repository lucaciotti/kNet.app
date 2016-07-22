<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Client extends Model
{
    protected $table = 'anagrafe';
    public $timestamps = false;
    protected $primaryKey = 'codice';
    public $incrementing = false;

    // Scope that garante to find only Client from anagrafe
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('client', function(Builder $builder) {
            $builder->where('codice', 'like', 'C%');
        });
    }

    // JOIN Tables
    public function doccli(){
      return $this->hasMany('knet\ArcaModels\DocCli', 'codicecf', 'codice');
    }

    public function agent(){
      return $this->belongsTo('knet\ArcaModels\Agent', 'agente', 'codice');
    }

    public function clasCli(){
      return $this->hasOne('knet\ArcaModels\ClasCli', 'codice', 'classe');
    }

    public function grpCli(){
      return $this->hasOne('knet\ArcaModels\GrpCli', 'codice', 'gruppolist');
    }

    public function detSect(){
      return $this->hasOne('knet\ArcaModels\Settore', 'codice', 'settore');
    }

    public function detStato(){
      return $this->hasOne('knet\ArcaModels\StatoCf', 'codice', 'statocf');
    }

    public function detZona(){
      return $this->hasOne('knet\ArcaModels\Zona', 'codice', 'zona');
    }

    public function detProv(){
      return $this->hasOne('knet\ArcaModels\Provinc', 'codice', 'prov');
    }

    public function detNation(){
      return $this->hasOne('knet\ArcaModels\Nazione', 'codice', 'codnazione');
    }

    public function detPag(){
      return $this->hasOne('knet\ArcaModels\Pagament', 'codice', 'pag');
    }

    public function scadToPay(){
      return $this->hasMany('knet\ArcaModels\Scadenza', 'codcf', 'codice');
    }

    //Multator
    // public function getDescrizionAttribute($value)
    // {
    //     return ucfirst(strtolower($value));
    // }

}
