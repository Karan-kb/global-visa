<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Service extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'services';
    protected $primaryKey = 'id';  
    protected $fillable=['title','body','image','order'];

    public function questionaire(){
        return $this->hasMany('App\Models\Questionaire');
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
