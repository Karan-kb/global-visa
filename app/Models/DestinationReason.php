<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationReason extends Model
{
    use HasFactory;

    protected $fillable=[
        'destination_id',
        'title',
        'image',
        'description'
    ];
}
