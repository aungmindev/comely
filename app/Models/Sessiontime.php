<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessiontime extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'name_en'];

    public function sessions()
    {
        return $this->hasMany(Psession::class , 'session_time_id');
    }
    public function laws()
    {
        return $this->hasMany(Law::class , 'session_time_id');
    }
    public function Qandp()
    {
        return $this->hasMany(QandProposal::class , 'session_time_id');
    }
}
