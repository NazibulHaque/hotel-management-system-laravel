<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use Illuminate\Database\Seeder;

class GalleryImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            ['category' => 'rooms', 'image_path' => 'images/bergen-harbour-standard-double-retusjert-1-1024x683-1.webp', 'alt_text' => 'The Olive Room reading nook'],
            ['category' => 'rooms', 'image_path' => 'images/Bergen-Harbour-breakfast-area-3.webp', 'alt_text' => 'Sea View Suite stone bathtub'],
            ['category' => 'rooms', 'image_path' => 'images/bergen-harbour-hotel.jpg', 'alt_text' => 'The Stone Loft mezzanine level'],
            ['category' => 'rooms', 'image_path' => 'images/Bergen-Harbour-breakfast-area-3.webp', 'alt_text' => 'The Mill Suite sitting room'],
            ['category' => 'grounds', 'image_path' => 'https://picsum.photos/seed/casaulika-g-sydney-grove1/500/380', 'alt_text' => 'Olive grove at sunrise'],
            ['category' => 'grounds', 'image_path' => 'https://picsum.photos/seed/casaulika-g-sydney-courtyard/500/380', 'alt_text' => 'Stone courtyard'],
            ['category' => 'grounds', 'image_path' => 'https://picsum.photos/seed/casaulika-g-sydney-pool/500/380', 'alt_text' => 'Pool area'],
            ['category' => 'grounds', 'image_path' => 'https://picsum.photos/seed/casaulika-g-sydney-facade/500/380', 'alt_text' => 'Mill facade'],
            ['category' => 'dining', 'image_path' => 'https://picsum.photos/seed/casaulika-g-sydney-breakfast/500/380', 'alt_text' => 'Breakfast on the terrace'],
            ['category' => 'dining', 'image_path' => 'https://picsum.photos/seed/casaulika-g-sydney-oil/500/380', 'alt_text' => 'Fresh-pressed olive oil bottles'],
            ['category' => 'dining', 'image_path' => 'https://picsum.photos/seed/casaulika-g-sydney-dinner/500/380', 'alt_text' => 'Evening dining pergola'],
            ['category' => 'dining', 'image_path' => 'https://picsum.photos/seed/casaulika-g-sydney-bread/500/380', 'alt_text' => 'Fresh bread loaves'],
        ];

        foreach ($images as $i => $img) {
            $img['sort_order'] = $i + 1;
            GalleryImage::updateOrCreate(
                ['image_path' => $img['image_path'], 'category' => $img['category']],
                $img
            );
        }
    }
}
