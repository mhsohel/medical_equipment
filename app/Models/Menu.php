<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'menu_sl',
        'status'

    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
