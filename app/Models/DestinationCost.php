<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\DestinationKeyFact;

class DestinationCost extends Model
{
    use HasFactory;

    protected $fillable = ['destination_id', 'title','type','image','value'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
