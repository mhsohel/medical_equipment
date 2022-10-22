<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'productCode',
        'shortDesc',
        'image',
        'description',
        'price',
        'status',


    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}