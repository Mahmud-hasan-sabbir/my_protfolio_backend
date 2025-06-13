<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'Category',
        'language',
        'project_url',
    ];
}


