<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
