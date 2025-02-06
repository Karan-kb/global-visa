<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationKeyFacts extends Model
{
    use HasFactory;
    protected $fillable = [
        'destination_id', 'language', 'cost_of_study', 'source_of_funding', 
        'required_exams', 'degrees', 'intakes', 'visa'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
