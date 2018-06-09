<?php

namespace App\Modules\Invoiceb\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
      'client_id',
      'name',
      'phone',
      'total',
      'time_total',
      'paid',
      'date_paid'
    ];

    public function client()
    {
      return $this->hasOne('App\Modules\Client\Models\Client', 'id', 'client_id');
    }

    public function items()
    {
      return $this->hasMany('App\Modules\Invoiceb\Models\InvoiceItem', 'invoice_id', 'id');
    }
}
