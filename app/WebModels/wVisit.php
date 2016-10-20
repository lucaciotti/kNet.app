<?php

namespace knet\WebModels;

use Illuminate\Database\Eloquent\Model;
use Torann\Registry\Facades\Registry;

class wVisit extends Model
{
  protected $table = 'w_visite';
  protected $dates = ['data', 'created_at', 'updated_at'];
  protected $fillable = ['codicecf', 'user_id', 'data', 'tipo', 'descrizione', 'note'];
  protected $connection = '';

  public function __construct ($attributes = array())
  {
    parent::__construct($attributes);
    //Imposto la Connessione al Database
    // dd(Registry::get('ditta_DB'));
    $this->setConnection(Registry::get('ditta_DB'));
  }

  public function user(){
    return $this->hasOne('knet\User', 'id', 'user_id');
  }
}
