<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'size_sqm', 'sleeps',
        'price_per_night', 'amenities', 'image_path', 'sort_order', 'is_published',
    ];

    protected $casts = [
        'amenities' => 'array',
        'is_published' => 'boolean',
        'price_per_night' => 'decimal:2',
    ];

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
