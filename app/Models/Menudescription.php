<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menudescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'menuTitle',
        'shortDesc',
        'image',
        'description',

    ];


    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
