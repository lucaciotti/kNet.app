<?php

namespace knet;

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


    //Multator
    public function getDescrizionAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

}
