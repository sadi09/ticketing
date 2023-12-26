<?php

namespace App\Models;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_point', 'end_point', 'stoppages'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function startPoint()
    {
        return $this->belongsTo(Location::class, 'start_point', 'id');
    }

    public function endPoint()
    {
        return $this->belongsTo(Location::class, 'end_point', 'id');
    }

    public function stoppages()
    {
        return $this->hasMany(Stoppage::class);
    }


}
