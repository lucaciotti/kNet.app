<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Torann\Registry\Facades\Registry;

use Auth;

class ScadCli extends Model
{
  protected $table = 'scadenze';
  public $timestamps = false;
  // protected $primaryKey = 'codice';
  // public $incrementing = false;
  protected $connection = '';
  protected $dates = ['datafatt', 'datascad', 'datasollec'];
  protected $appends = ['desc_pag'];

  // Scope that garante to find only Client from anagrafe
  protected static function boot()
  {
      parent::boot();

      static::addGlobalScope('scadClient', function(Builder $builder) {
          $builder->where('codcf', 'like', 'C%');
      });

      if (Auth::check()){
        if (Auth::user()->hasRole('agent')){
          static::addGlobalScope('agent', function(Builder $builder) {
              $builder->where('codag', Auth::user()->codag);
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
              $builder->where('codcf', Auth::user()->codcli);
          });
        }
      }
  }

  public function __construct()
  {
    //Imposto la Connessione al Database
    // dd(Registry::get('ditta_DB'));
    $this->setConnection(Registry::get('ditta_DB'));
  }

  public function getDescPagAttribute()
    {
      $desc='none';
      switch ($this->attributes['tipo']) {
        case 'D':
          $desc='Rimessa Diretta';
          break;
        case 'R':
          $desc='Ricevuta Bancaria';
          break;
        case 'T':
          $desc='Tratta';
          break;
        case 'P':
          $desc='Pagherò';
          break;
        case 'L':
          $desc='Bollettino di C/C';
          break;
        case 'C':
          $desc='Contrassegno';
          break;
        case 'B':
          $desc='Bonifico';
          break;
        case 'A':
          $desc='Altro';
          break;
        default:
          $desc='none';
      }
      if ($this->attributes['tipo']=='D') {
        $desc='Rimessa Diretta';
      }
      return $desc;
    }

  public function client(){
    return $this->belongsTo('knet\ArcaModels\Client', 'codcf', 'codice');
  }

  public function docCli(){
    return $this->belongsTo('knet\ArcaModels\DocCli', 'id_doc', 'id');
  }

  public function pagament(){
    return $this->hasOne('knet\ArcaModels\Pagament', 'codice', 'codpag');
  }

  public function detSollec(){
    return $this->hasOne('knet\ArcaModels\Sollecito', 'codice', 'sollecito');
  }

  public function agent(){
    return $this->belongsTo('knet\ArcaModels\Agent', 'codag', 'codice');
  }

  public function storia(){
    return $this->belongsToMany('knet\ArcaModels\CreditStr', 'u_scadcre', 'id_scad', 'id_crediti', 'id', 'id');
  }
}
