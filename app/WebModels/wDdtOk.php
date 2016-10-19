<?php

namespace knet\WebModels;

use Illuminate\Database\Eloquent\Model;
use Torann\Registry\Facades\Registry;

class wDdtOk extends Model
{
  protected $table = 'w_ddtok';
  protected $dates = ['created_at', 'updated_at'];
  protected $fillable = ['firma', 'note', 'id_testa', 'user_id'];
  protected $connection = '';

  public function __construct()
  {
    //Imposto la Connessione al Database
    // dd(Registry::get('ditta_DB'));
    $this->setConnection(Registry::get('ditta_DB'));
  }

  // JOIN Tables
  public function doccli(){
    return $this->belongsTo('knet\ArcaModels\DocCli', 'id_testa', 'id');
  }
}
