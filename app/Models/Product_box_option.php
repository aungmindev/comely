<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_box_option extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'box_option_id' ,
    ];
}
