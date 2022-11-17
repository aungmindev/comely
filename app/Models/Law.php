<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    protected $fillable = [
        'law_type' ,
        'parliament_times_id' ,
        'law_name' ,
        'law_name_en' ,
        'session_time' ,
        'session_time_en' ,
        'dop' ,
        'proposed_from' ,
        'proposed_from_en',
        'dopd' ,
        'doprd' ,
        'pdf' ,
        'image',
        'summary' ,
        'summary_en' ,
    ];

    public function parliament_time()
    {
        return $this->belongsTo(Parliament::class , 'parliament_times_id');
    }
}
