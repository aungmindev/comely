<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QandProposal extends Model
{
    use HasFactory;
    protected $fillable = [
            'qnadp_type' ,
            'isstar',
            'parliament_times_id',
            'title' ,
            'title_en' ,
            'session_time' ,
            'session_time_en' ,
            'pdf',
            'image' ,
            'summary' ,
            'summary_en',
    ];
    public function parliament_time()
    {
        return $this->belongsTo(Parliament::class , 'parliament_times_id');
    }
}
