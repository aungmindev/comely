<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psession extends Model
{
    use HasFactory;

    protected $fillable = [
        'sessiontype_id' ,
            'session_data_type' ,
            'parliament_times_id' ,
            'title' ,
            'title_en' ,
            'session_time_id' ,
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
    public function session_type()
    {
        return $this->belongsTo(Sessiontype::class , 'sessiontype_id');
    }
    public function session_times()
    {
        return $this->belongsTo(Sessiontime::class , 'session_time_id');
    }
}
