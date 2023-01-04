<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salehistory extends Model
{
    use HasFactory;
    protected $fillable = ['product_id' ,
    'item_code' ,
    'product_name' ,
    'price' ,
    'brand' ,
    'category' ,];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
