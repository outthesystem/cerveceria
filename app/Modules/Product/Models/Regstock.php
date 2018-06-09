<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

class Regstock extends Model
{
    protected $fillable = [
      'product_id',
      'invoice_item_id',
      'stock_old',
      'stock_modify',
      'stock_new',
      'reason',
      'sum'
    ];

}
