<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable=[
        'student_id',
        'course_id',
        'start_date',
        'package_id',
        'comment',
        'previous_score',
        'attempts',
        'status'

    ];

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\EnglishTest');
    }
    
    public function result()
    {
        return $this->hasOne('App\Models\Result');
    }
    
    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }
}
