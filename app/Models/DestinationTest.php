<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationTest extends Model
{
    use HasFactory;

    protected $fillable = ['destination_id', 'title', 'value'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
