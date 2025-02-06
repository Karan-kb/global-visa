<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
    	'name',
		'image',
		'phone',
		'email',
		'nationality',
		'state',
		'address',
		'post_code',
		'dob'
    ];
    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function previousCourses()
    {
        return $this->hasMany('App\Models\PreviousCourse');
    }

    public function documents()
    {
        return $this->hasMany('App\Models\Document');
    }
}
