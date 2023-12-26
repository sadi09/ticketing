<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stoppage extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id', 'route_id'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
