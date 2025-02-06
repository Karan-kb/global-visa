<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description','order', 'image', 'country', 'city', 'state', 'ranking', 'is_active'
    ];

    public function destinations()
    {
        return $this->belongsToMany(Destination::class, 'destination_universities');
    }

    public function nation()
    {
        return $this->belongsTo(Country::class, 'country', 'code');
    }
    
}
