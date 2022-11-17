<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psession extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_type' ,
            'session_data_type' ,
            'parliament_times_id' ,
            'title' ,
            'title_en' ,
            'session_time' ,
            'session_time_en' ,
            'date' ,
            'pdf' ,
            'image' ,
            'summary' ,
            'summary_en' ,
    ];

    public function parliament_time()
    {
        return $this->belongsTo(Parliament::class , 'parliament_times_id');
    }
}
