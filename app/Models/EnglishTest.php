<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnglishTest extends Model
{
    use HasFactory;
    protected $fillable=['title','body','image','status','order'];
}
