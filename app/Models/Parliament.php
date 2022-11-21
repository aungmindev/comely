<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parliament extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'name_en'];

     public function sessions()
    {
        return $this->hasMany(Psession::class , 'parliament_times_id');
    }
     public function laws()
    {
        return $this->hasMany(Law::class , 'parliament_times_id');
    }
     public function qandps()
    {
        return $this->hasMany(QandProposal::class , 'parliament_times_id');
    }
     public function reports()
    {
        return $this->hasMany(Report::class , 'parliament_times_id');
    }
}
