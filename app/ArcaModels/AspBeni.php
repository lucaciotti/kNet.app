<?php

namespace knet\ArcaModels;

use Illuminate\Database\Eloquent\Model;
use Torann\Registry\Facades\Registry;

class AspBeni extends Model
{
  protected $table = 'aspbeni';
  public $timestamps = false;
  protected $primaryKey = 'codice';
  public $incrementing = false;
  protected $connection = '';

  public function __construct ($attributes = array())
  {
    parent::__construct($attributes);
    //Imposto la Connessione al Database
    // dd(Registry::get('ditta_DB'));
    $this->setConnection(Registry::get('ditta_DB'));
  }

  // JOIN Tables
  public function docCli(){
    return $this->belongsTo('knet\ArcaModels\DocCli', 'codice', 'aspbeni');
  }
}
