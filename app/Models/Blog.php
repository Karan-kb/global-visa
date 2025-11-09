<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use Sluggable;
    use HasFactory;
    protected $fillable=['title','body','image','location','category_id','featured','short_description','seo_title','seo_description','seo_keyword','seo_image'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title']
            ]
        ];
    }
    
}
