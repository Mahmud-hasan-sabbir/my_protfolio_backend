<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'long_title',
        'description',
        'cus_count',
        'years_of_experience',
        'complete_project',
        'team_member',
        'image',
    ];
}


