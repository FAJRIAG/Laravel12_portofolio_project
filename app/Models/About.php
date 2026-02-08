<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory, \App\Traits\Translatable;

    protected $fillable = [
        'page_title',
        'page_title_id',
        'page_title_ja',
        'title',
        'title_id',
        'title_ja',
        'description',
        'description_id',
        'description_ja',
        'image',
        'hero_title',
        'hero_title_id',
        'hero_title_ja',
        'hero_description',
        'hero_description_id',
        'hero_description_ja',
        'logo_text',
        'cv_path',
    ];
}
