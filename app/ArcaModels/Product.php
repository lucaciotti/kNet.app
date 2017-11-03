<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Torann\Registry\Facades\Registry;

class Product extends Model
{
  protected $table = 'magart';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;
  protected $connection = '';

  protected $dates = ['u_datacrea'];
  protected $appends = ['master_clas', 'master_grup', 'listino', 'tipo_prod'];

  // Scope that garante to find only Supplier from anagrafe
  protected static function boot()
  {
      parent::boot();

      static::addGlobalScope('Listino', function(Builder $builder) {
          $builder->where('u_artlis', '=', true);
      });
  }

  public function __construct ($attributes = array())
  {
    self::boot();
    parent::__construct($attributes);
    //Imposto la Connessione al Database
    // dd(Registry::get('ditta_DB'));
    $this->setConnection(Registry::get('ditta_DB'));
  }

  //Accessors
  public function getMasterClasAttribute(){
      return substr($this->attributes['classe'],0,3);
  }

  public function getMasterGrupAttribute(){
      return substr($this->attributes['gruppo'],0,3);
  }

  public function getTipoProdAttribute(){
      if (substr($this->attributes['gruppo'],0,3)=="B06"){
        $tipo = "Kubica";
      } elseif (substr($this->attributes['gruppo'],0,1)=="B") {
        $tipo = "Koblenz";
      } elseif (substr($this->attributes['gruppo'],0,1)=="A") {
        $tipo = "Krona";
      } elseif (substr($this->attributes['gruppo'],0,1)=="C") {
        $tipo = "Grass";
      } elseif (substr($this->attributes['gruppo'],0,1)=="2") {
        $tipo = "Campioni";
      } else {
        $tipo = "KK";
      }
      return $tipo;
  }

  public function getListinoAttribute(){
      if(substr($this->attributes['gruppo'],0,1)=='B'){
        $listino = $this->attributes['listino6'];
      } else {
        $listino = $this->attributes['listino1'];
      }
      return $listino;
  }

  // JOIN Tables
  public function docrow(){
    return $this->hasMany('knet\ArcaModels\DocRow', 'codicearti', 'codice');
  }

  // PER CERCARE I DOCUMENTI CON QUESTE RIGHE:
  //  knet\ArcaModels\Product::find('0500 1')->docrow()->with(['doccli' => function($query) { $query->where('tipodoc','OC');}])->first()

  // public function doccli(){
  //   return $this->hasManyThrough('knet\ArcaModels\DocCli', 'knet\ArcaModels\DocRow', 'codicearti', 'id');
  // }

  // public function docsup(){
  //   return $this->hasManyThrough('knet\ArcaModels\DocSup', 'knet\ArcaModels\DocRow', 'codicearti', 'id', 'codice', 'id_testa');
  // }

  public function masterClas(){
    return $this->hasOne('knet\ArcaModels\ClasProd', 'codice', 'master_clas');
  }

  public function clasProd(){
    return $this->hasOne('knet\ArcaModels\SubClasProd', 'codice', 'classe');
  }

  public function masterProd(){
    return $this->hasOne('knet\ArcaModels\GrpProd', 'codice', 'master_grup');
  }

  public function grpProd(){
    return $this->hasOne('knet\ArcaModels\SubGrpProd', 'codice', 'gruppo');
  }

  //Multator
  // public function getDescrizionAttribute($value)
  // {
  //     return ucfirst(strtolower($value));
  // }
}
