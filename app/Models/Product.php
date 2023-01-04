<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
            'item_code'  ,
            'name'  ,
            'name_en'  ,
            'brand_id'  ,
            'category_id'  ,
            'colors'  ,
            'length'  ,
            'width'  ,
            'height'  ,
            'stock'  ,
            'regular_price'  ,
            'original_sale_price'  ,
            'after_discount_price'  ,
            'discount_percent'  ,
            'description'  ,
            'description_en'  ,
    ];

    public function product_images()
    {
        return $this->hasMany(Product_image::class , 'product_id');
    }
    public function box_options()
    {
        return $this->hasMany(Product_box_option::class , 'product_id');
    }
    public function brands()
    {
        return $this->belongsTo(Brand::class , 'brand_id');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }
}
