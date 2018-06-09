<?php

namespace App\Modules\Client\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
      'name',
      'phone',
      'observaciones'
    ];
}
