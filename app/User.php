<?php

namespace knet;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
  use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $username = 'name';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function client(){
      return $this->hasOne('knet\ArcaModels\Client', 'codice', 'codcli');
    }

    public function agent(){
      return $this->hasOne('knet\ArcaModels\Agent', 'codice', 'codag');
    }
}
