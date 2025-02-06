<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Destination extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title', 'slug', 'sub_title', 'country', 'description', 'banner_image','video_image', 'youtube_link', 
        'requirement', 'scholarship', 'in_take', 'order', 'is_active','why_image',
                'why_subtitle',
                'fact_subtitle',
                'city_subtitle',
                'reason_subtitle',
                'health_subtitle',
                'job_subtitle',
                'best_cities',
                'video_image',
                'seo_title',
                'seo_keyword',
                'seo_description',
                'seo_image',

    ];

    public function tests()
    {
        return $this->hasMany(DestinationTest::class);
    }

    public function facts()
    {
        return $this->hasMany(DestinationFacts::class);
    }

    public function reasons()
    {
        return $this->hasMany(DestinationReason::class);
    }

    public function jobs()
    {
        return $this->hasMany(DestinationJob::class);
    }

    public function healths()
    {
        return $this->hasMany(DestinationHealth::class);
    }

    public function visas()
    {
        return $this->hasMany(DestinationVisaProcess::class);
    }

    public function latestVisa()
{
    return $this->hasOne(DestinationVisaProcess::class)->latest();
}


   public function latestScholarship()
{
    return $this->hasOne(DestinationScholarship::class)->latest();
}
    public function scholarships()
    {
        return $this->hasMany(DestinationScholarship::class);
    }

    public function costs()
    {
        return $this->hasMany(DestinationCost::class);
    }

    public function latestCost()
    {
        return $this->hasOne(DestinationCost::class)
                ->where('type', 'education')
                ->latest('created_at');
    }


    public function latestLivingCost()
    {
        return $this->hasOne(DestinationCost::class)
                ->where('type', 'living')
                ->latest('created_at');
    }

    public function keyFacts()
    {
        return $this->hasMany(DestinationKeyFacts::class);
    }

    public function faqs()
    {
        return $this->hasMany(DestinationFaq::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'destination_courses');
    }

    public function universities()
    {
        return $this->belongsToMany(University::class, 'destination_universities');
    }


    public function univs()
    {
        return $this->hasMany(DestinationUniversity::class);
    }


    public function majors()
    {
        return $this->hasMany(DestinationCourse::class);
    }

    public function nation()
{
    return $this->belongsTo(Country::class, 'country', 'code');
}




    public function sluggable(): array
{
    return [
        'slug' => [
            'source' => 'title' 
        ]
    ];
}

}
