<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\GalleryImage;
use App\Models\Room;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'roomCount' => Room::count(),
            'galleryCount' => GalleryImage::count(),
            'testimonialCount' => Testimonial::count(),
            'newEnquiryCount' => Enquiry::where('status', 'new')->count(),
            'recentEnquiries' => Enquiry::with('room')->latest()->take(5)->get(),
        ]);
    }
}
