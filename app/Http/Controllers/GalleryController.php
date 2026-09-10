<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::orderBy('category')->orderBy('sort_order')->get();

        return view('gallery.index', compact('images'));
    }
}
