<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    public function index()
    {
        $images = GalleryImage::orderBy('category')->orderBy('sort_order')->get();

        return view('admin.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        GalleryImage::create($this->validated($request));

        return redirect()->route('admin.gallery.index')->with('success', 'Image added.');
    }

    public function edit(GalleryImage $galleryImage)
    {
        return view('admin.gallery.edit', ['image' => $galleryImage]);
    }

    public function update(Request $request, GalleryImage $galleryImage)
    {
        $galleryImage->update($this->validated($request));

        return redirect()->route('admin.gallery.index')->with('success', 'Image updated.');
    }

    public function destroy(GalleryImage $galleryImage)
    {
        $galleryImage->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Image deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'category' => ['required', 'in:rooms,grounds,dining'],
            'image_path' => ['required', 'string', 'max:255'],
            'caption' => ['nullable', 'string', 'max:255'],
            'alt_text' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}
