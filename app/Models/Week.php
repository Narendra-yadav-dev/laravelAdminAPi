<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;
    protected $fillable = [
        'learnId',
        'name',
        'title',
        'duration',
        'description_name',
        'description_title',
        'description_content',
        'description_video',
        'description_pdf',
        'status',
    ];
}
