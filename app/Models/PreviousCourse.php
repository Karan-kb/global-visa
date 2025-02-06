<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousCourse extends Model
{
    use HasFactory;
    protected $fillable=[
        'student_id',
        'name',
        'reading',
        'writing',
        'listening',
        'speaking',
        'attempts',
        'result',
        'publish',
        'remarks'
    ];

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
}
