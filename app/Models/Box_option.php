<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box_option extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
            'name_en',
            'price' ,
            'description' ,
            'description_en' ,
    ];

    public function box_images()
    {
        return $this->hasMany(Boximage::class , 'box_id');
    }
}
