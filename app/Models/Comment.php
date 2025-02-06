<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['name','email','message','blog_id','event_id','news_id','package_id'];

    public function blog(){
        return $this->belongsTo('App\Models\Blog');

    }

    public function event(){
        return $this->belongsTo('App\Models\Event');

    }

    public function news(){
        return $this->belongsTo('App\Models\News');

    }

    public function package(){
        return $this->belongsTo('App\Models\Package');

    }

    
}
