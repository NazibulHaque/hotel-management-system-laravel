<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Testimonial;

class PageController extends Controller
{
    public function home()
    {
        $featuredRooms = Room::published()->orderBy('sort_order')->take(3)->get();
        $featuredTestimonial = Testimonial::published()->orderBy('sort_order')->first();

        return view('home', compact('featuredRooms', 'featuredTestimonial'));
    }

    public function about()
    {
        return view('about');
    }
}
