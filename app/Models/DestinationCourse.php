<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationCourse extends Model
{
    use HasFactory;

    protected $fillable = ['destination_id', 'course_id'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function courses()
    {
        $courseIds = json_decode($this->course_id, true); // Decode JSON to array
        return Course::whereIn('id', $courseIds)->get(); // Fetch courses
    }


}
