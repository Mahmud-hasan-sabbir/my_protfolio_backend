<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'edu_name',
        'inst_name',
        'deft',
        'result',
        'board',
        'group',
        'pass_year',
    ];
}



