<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            ['guest_name' => 'Marijana K.', 'quote' => 'We came for two nights and stayed for five. The Sea View Suite and its beautiful coastal outlook made the trip unforgettable.', 'rating' => 5, 'stay_context' => 'Sea View Suite, June 2026'],
            ['guest_name' => 'Tomasz W.', 'quote' => 'The breakfast and fresh olive oil were wonderful. Sitting on the terrace each morning was one of our favourite parts of the stay.', 'rating' => 5, 'stay_context' => 'The Olive Room, May 2026'],
            ['guest_name' => 'Freya L.', 'quote' => 'Loved the Stone Loft. The room was full of character and the original timber details made it feel completely different from a typical hotel.', 'rating' => 4, 'stay_context' => 'The Stone Loft, April 2026'],
            ['guest_name' => 'Davide R.', 'quote' => 'The Mill Suite was spacious, comfortable, and beautifully designed. We loved the story behind the restored building.', 'rating' => 5, 'stay_context' => 'The Mill Suite, March 2026'],
            ['guest_name' => 'Hana S.', 'quote' => 'Quiet, well-kept, and incredibly welcoming. The staff remembered our names by day two. We are already planning another Sydney trip.', 'rating' => 5, 'stay_context' => 'Sea View Suite, February 2026'],
            ['guest_name' => 'Callum B.', 'quote' => 'Beautiful building and a genuinely restful stay. The atmosphere was peaceful, and the nearby coastline was perfect for morning walks.', 'rating' => 4, 'stay_context' => 'The Olive Room, January 2026'],
        ];

        foreach ($testimonials as $i => $t) {
            $t['sort_order'] = $i + 1;
            Testimonial::updateOrCreate(
                ['guest_name' => $t['guest_name'], 'stay_context' => $t['stay_context']],
                $t
            );
        }
    }
}
