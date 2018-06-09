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
      'date_reservation',
      'hour_reservation',
      'reserved',
      'time_total',
      'paid',
      'date_paid'
    ];

    public function client()
    {
      return $this->hasOne('App\Modules\Client\Models\Client', 'id', 'client_id');
    }

    public function scopeInvoicer($query)
    {
      return $this->where('reserved', '=', NULL);
    }

    public function items()
    {
      return $this->hasMany('App\Modules\Invoiceb\Models\InvoiceItem', 'invoice_id', 'id');
    }
}
