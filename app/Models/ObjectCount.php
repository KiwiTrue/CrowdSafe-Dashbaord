<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectCount extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'count', 'location_id'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
