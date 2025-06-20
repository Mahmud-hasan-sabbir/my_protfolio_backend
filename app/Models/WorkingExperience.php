<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'com_name',
        'designation',
        'yeartoyear',
        'description',
    ];
}

