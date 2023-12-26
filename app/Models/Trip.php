<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id', 'route_id', 'buses_id'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function busdriver()
    {
        return $this->belongsTo(Staff::class, 'driver_id', 'id');
    }

    public function triproute()
    {
        return $this->belongsTo(Route::class, 'route_id', 'id');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'buses_id', 'id');
    }

    public function stoppage()
    {
        return $this->hasMany(Stoppage::class);
    }

    public function startPoint()
    {
        return $this->belongsTo(Location::class, 'start_point', 'id');
    }

    public function endPoint()
    {
        return $this->belongsTo(Location::class, 'end_point', 'id');
    }
}
