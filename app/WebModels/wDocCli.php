<?php

namespace knet\WebModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Torann\Registry\Facades\Registry;
use Auth;

class wDocCli extends Model
{
    protected $table = 'w_doctes';
    protected $dates = ['datadoc', 'v1data'];
    protected $connection = '';

    public function __construct()
    {
      self::boot();
      //Imposto la Connessione al Database
      // dd(Registry::get('ditta_DB'));
      $this->setConnection(Registry::get('ditta_DB'));
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('doccli', function(Builder $builder) {
            $builder->where('codicecf', 'LIKE', 'C%');
        });

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
                $builder->where('codicecf', Auth::user()->codcli);
            });
          }
        }
    }

    // JOIN Tables
    public function client(){
      return $this->belongsTo('knet\ArcaModels\Client', 'codicecf', 'codice');
    }

    public function docrow(){
      return $this->hasMany('knet\ArcaModels\DocRow', 'id_testa', 'id');
    }
}
