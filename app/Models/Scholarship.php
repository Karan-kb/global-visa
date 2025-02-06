<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'slug',
        'desti_id',
        'corse_id',
        'uni_id',
        'description',
        'short_description',
        'image',
        'status'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'corses_id');
    }

    public function universities()
    {
        return $this->belongsToMany(University::class, 'uni_id');
    }

    public function nation()
  {

    return $this->belongsTo(Country::class, 'country', 'code');
  }

}
