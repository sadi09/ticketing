<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = ['staff_name', 'staff_name', 'address', 'nid'];

    protected $hidden = ['created_at', 'updated_at'];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
