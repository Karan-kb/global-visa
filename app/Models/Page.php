<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Page extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable=['title','body','image','contentfield','seo_title','seo_image','seo_description','seo_keyword'];
    public function menu(){
        return $this->hasOne('App\Models\Menu');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title']
            ]
        ];
    }

    public function pageContents(){
        return $this->hasMany(PageContent::class);
    }
}
