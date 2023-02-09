<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'catId',
        'title',
        'sku',
        'price',
        'color',
        'size',
        'quantity',
        'model',
        'discount',
        'description',
        'status',
        'image',
        'gallary',
        'thumbnail',
    ];
}
