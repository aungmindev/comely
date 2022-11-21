<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessiontype extends Model
{
    use HasFactory;

    public function sessions()
    {
        return $this->hasMany(Psession::class , 'parliament_times_id');
    }
}
