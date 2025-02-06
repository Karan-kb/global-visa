<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Album extends Model
{
    use HasFactory;
    protected $fillable=['title','type','cover'];
    public function medias(){
        return $this->hasMany('App\Models\Media');
    }
}
