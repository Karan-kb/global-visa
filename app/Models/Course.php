<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'credit_hour','order','banner_image', 'is_active'];

    public function destinations()
    {
        return $this->belongsToMany(Destination::class, 'destination_courses' ,'destination_id' ,'id');
    }
}
