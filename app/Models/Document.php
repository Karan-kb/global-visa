<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable=[
        'student_id',
        'filename',
        'type',
        'description'

    ];

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
}
