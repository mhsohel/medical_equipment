<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leadingpage extends Model
{
    use HasFactory;

    protected $fillable = [
        'tagline',
        'title',
        'header',
        'mission',
        'vission',
        'image'

    ];
}
