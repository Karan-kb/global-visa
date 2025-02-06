<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageTest extends Model
{
    use HasFactory;
    protected $fillable=['title','body','image','status','order'];
}
