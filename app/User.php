<?php

namespace knet;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;

class User extends Authenticatable implements LogsActivityInterface
{
  use EntrustUserTrait;
  use LogsActivity;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nickname', 'email', 'password', 'ditta'
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

    public function roles(){
        return $this->belongsToMany('knet\Role');
    }

    /**
     * Get the message that needs to be logged for the given event name.
     *
     * @param string $eventName
     * @return string
     */
    public function getActivityDescriptionForEvent($eventName){
      switch ($eventName) {
        case 'created':
          return 'User Id:"' . $this->id . '" was created ' .$this->toJson();
          break;
        case 'updated':
          return 'User Id:"' . $this->id . '" was updated ' .json_encode($this->getDirty());
          break;
        case 'deleted':
          return 'User Id:"' . $this->id . '" was deleted';
          break;

        default:
          return 'User Id:"' . $this->id . '" was ??';
          break;
      }
    }
}
