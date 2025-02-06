<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;


    protected $fillable=[
        'first_name',
        'last_name',
        'test_id',
        'email',
        'phone',
        'subject',
        'messege'
    ];


    public function test(){
        return $this->belongsTo(EnglishTest::class, 'test_id');
    }


    public function destination(){
        return $this->belongsTo(Destination::class);
    }

}
