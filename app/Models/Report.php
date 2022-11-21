<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'parliament_times_id',
        'title' ,
        'title_en' ,
        'session_time_id' ,
        'pdf',
        'image' ,
        'summary' ,
        'summary_en',
];
    public function parliament_time()
    {
        return $this->belongsTo(Parliament::class , 'parliament_times_id');
    }

    public function session_times()
    {
        return $this->belongsTo(Sessiontime::class , 'session_time_id');
    }
}
