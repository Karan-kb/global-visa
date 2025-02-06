<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Highlight extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable=['destination_id','flag','founded','capital','form','animal_name','animal_image','population','area'];

    public function destination(){
        return $this->belongsTo('App\Models\Destination');

    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['capital']
            ]
        ];
    }
}
