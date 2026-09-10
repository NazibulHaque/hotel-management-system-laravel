<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            [
                'name' => 'The Olive Room',
                'slug' => 'the-olive-room',
                'description' => 'Garden-facing, with a private reading nook built into the original mill wall. Our smallest and quietest room.',
                'size_sqm' => 18,
                'sleeps' => 2,
                'price_per_night' => 145,
                'amenities' => ['Garden view', 'Rain shower', 'Ceiling fan'],
                'image_path' => 'images/superior-king.jpg',
                'sort_order' => 1,
            ],
            [
                'name' => 'Sea View Suite',
                'slug' => 'sea-view-suite',
                'description' => 'Our largest standard room, with a stand-alone stone bathtub facing the water and a private balcony overlooking the coast.',
                'size_sqm' => 28,
                'sleeps' => 3,
                'price_per_night' => 225,
                'amenities' => ['Sea view', 'Stone bathtub', 'Private balcony'],
                'image_path' => 'images/superior-twin-2.webp',
                'sort_order' => 2,
            ],
            [
                'name' => 'The Stone Loft',
                'slug' => 'the-stone-loft',
                'description' => 'A split-level room set beneath the original timber roof beams, with a mezzanine sleeping area reached by a narrow stone stair.',
                'size_sqm' => 32,
                'sleeps' => 4,
                'price_per_night' => 195,
                'amenities' => ['Partial sea view', 'Mezzanine', 'Exposed beams'],
                'image_path' => 'images/standard-twin.jpg',
                'sort_order' => 3,
            ],
            [
                'name' => 'The Mill Suite',
                'slug' => 'the-mill-suite',
                'description' => "Our largest suite, built around a preserved section of the original olive press, with a spacious sitting room and views toward Sydney's coastline.",
                'size_sqm' => 46,
                'sleeps' => 4,
                'price_per_night' => 310,
                'amenities' => ['Sea view', 'Two floors', 'Kitchenette'],
                'image_path' => 'images/bergen-harbour-standard-double-retusjert-1-1024x683-1.webp',
                'sort_order' => 4,
            ],
        ];

        foreach ($rooms as $room) {
            Room::updateOrCreate(['slug' => $room['slug']], $room);
        }
    }
}
