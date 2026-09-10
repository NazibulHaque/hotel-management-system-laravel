<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'category', 'image_path', 'caption', 'alt_text', 'sort_order',
    ];

    public const CATEGORIES = ['rooms', 'grounds', 'dining'];
}
