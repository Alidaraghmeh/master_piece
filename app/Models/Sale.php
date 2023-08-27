<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['name_product', 'buyer_name', 'buyer_phone', 'card_name', 'card_number', 'Total', 'product_id'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
  
}
