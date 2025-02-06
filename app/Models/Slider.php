<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    
    protected $fillable=[
      "order_no",
      "title",
      "heading",
      "button_text",
      "button_url",
      "youtube_url",
      "status",
      "created_by",
      "updated_by",
      "image_1",
      "image"
    ];
}
