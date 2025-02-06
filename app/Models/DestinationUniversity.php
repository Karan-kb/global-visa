<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationUniversity extends Model
{
    use HasFactory;

    protected $fillable = ['destination_id', 'university_id'];
    
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function universities()
    {
        $universityIds = json_decode($this->university_id, true); // Decode JSON to array
        return University::whereIn('id', $universityIds)->get(); // Fetch courses
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
