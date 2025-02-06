<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionaire extends Model
{
    use HasFactory;
    protected $fillable=['destination_id','service_id','status','question','answer','order'];

    public function destination(){
        return $this->belongsTo('App\Models\Destination');

    }

    public function service(){
        return $this->belongsTo('App\Models\Service');

    }
}
