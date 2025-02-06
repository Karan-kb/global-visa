<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable=['name','email','message','subject','phone','destination_id'];


    public function destination(){
        return $this->belongsTo(Destination::class);
    }
}
