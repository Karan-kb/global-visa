<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable=['destination_id','city','image'];

    public function destination(){
        return $this->belongsTo('App\Models\Destination');

    }
}
