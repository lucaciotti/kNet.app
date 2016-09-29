<?php

namespace knet\WebModels;

use Illuminate\Database\Eloquent\Model;

class wVisit extends Model
{
  protected $table = 'w_visite';
  protected $dates = ['data', 'created_at', 'updated_at'];
}
