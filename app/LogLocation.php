<?php

namespace knet;

use Illuminate\Database\Eloquent\Model;

class LogLocation extends Model
{
    protected $table = 'log_location';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['ip_address', 'user_id'];
}
