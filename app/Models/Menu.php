<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Menu extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable=['title','level','order','parent_id','page_id'];
    public function parent_name($parent_id){
        $parent=Menu::find($parent_id);
        return $parent;
    }
    public function page(){
        return $this->belongsTo('App\Models\Page');
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
