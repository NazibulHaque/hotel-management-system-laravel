<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::published()->orderBy('sort_order')->get();

        return view('testimonials.index', compact('testimonials'));
    }
}
