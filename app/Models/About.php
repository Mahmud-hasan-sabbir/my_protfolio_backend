<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desig',
        'phn_number',
        'short_text',
        'image',
        'gmail',
        'address',
        'fb_link',
        'twiter_link',
        'linkdin_link',
        'github_link',
        'title',
        'description'
    ];
}



