<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    protected $fillable = [
        'hero_location',
        'hero_title',
        'hero_description',
        'hero_image',

        'rating',
        'rating_text',

        'highlights_tag',
        'highlights_title',

        'highlight_1_title',
        'highlight_1_description',

        'highlight_2_title',
        'highlight_2_description',

        'highlight_3_title',
        'highlight_3_description',

        'rooms_tag',
        'rooms_title',
        'rooms_description',
    ];

    protected $casts = [
        'rating' => 'decimal:1',
    ];
}
