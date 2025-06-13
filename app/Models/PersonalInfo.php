<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dob',
        'fa_name',
        'mo_name',
        'height',
        'weight',
        'presentAddress',
        'permanentAddress',
        'nationality',
        'religion',
        'blodgroup',
        'cellno'
    ];

}


