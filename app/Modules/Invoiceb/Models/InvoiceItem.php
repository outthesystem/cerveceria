<?php

namespace App\Modules\Invoiceb\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $fillable = [
      'invoice_id',
      'product_id',
      'price',
      'quantity',
      'total',
      'time'
    ];

    public function product()
    {
      return $this->hasOne('App\Modules\Product\Models\Product', 'id', 'product_id');
    }
}
