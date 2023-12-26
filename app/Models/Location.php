<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    public function trip()
    {
        return $this->hasMany(Trip::class);
    }

    public function stoppage()
    {
        return $this->hasMany(Stoppage::class);
    }
}
