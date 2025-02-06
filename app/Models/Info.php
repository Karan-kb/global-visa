<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    
    protected $fillable=['name','address','address1','website','phone','mobile','email','logo','facebook','twitter','admission_year','admission_season','linkedIn','pobox','opens','closes','fax','favicon','intro_video','study_destination_video','footer_about'];
}
