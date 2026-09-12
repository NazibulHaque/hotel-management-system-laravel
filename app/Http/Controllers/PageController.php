<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use App\Models\Room;
use App\Models\Testimonial;

class PageController extends Controller
{
    public function home()
    {
        $homeSetting = HomeSetting::first();
        $featuredRooms = Room::published()->orderBy('sort_order')->take(3)->get();
        $featuredTestimonial = Testimonial::published()->orderBy('sort_order')->first();

        return view('home', compact('homeSetting', 'featuredRooms', 'featuredTestimonial'));
    }

    public function about()
    {
        return view('about');
    }
}
