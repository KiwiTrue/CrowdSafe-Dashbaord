<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'capacity', 'type', 'latitude', 'longitude'];


    public function objectCounts()
    {
        return $this->hasMany(ObjectCount::class);
    }
}
