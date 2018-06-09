<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'id',
      'category_id',
      'name',
      'description',
      'stock',
      'price',
      'count_stock',
      'is_cut',
      'time'
    ];

    public function category()
    {
      return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function regstocks()
    {
      return $this->hasMany(Regstock::class, 'product_id', 'id');
    }
}
