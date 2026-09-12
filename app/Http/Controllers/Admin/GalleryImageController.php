<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    public function index()
    {
        $images = GalleryImage::orderBy('category')
            ->orderBy('sort_order')
            ->get();

        return view('admin.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        GalleryImage::create($this->validated($request));

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Image added.');
    }

    public function edit(GalleryImage $galleryImage)
    {
        return view('admin.gallery.edit', ['image' => $galleryImage]);
    }

    public function update(Request $request, GalleryImage $galleryImage)
    {
        $galleryImage->update($this->validated($request, $galleryImage));

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Image updated.');
    }

    public function destroy(GalleryImage $galleryImage)
    {
        $galleryImage->delete();

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Image deleted.');
    }

    private function validated(
        Request $request,
        ?GalleryImage $galleryImage = null
    ): array {
        $rules = [
            'category' => ['required', 'in:rooms,grounds,dining'],

            'image_path' => [
                $galleryImage ? 'nullable' : 'required',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:5120',
            ],

            'caption' => ['nullable', 'string', 'max:255'],

            'alt_text' => ['required', 'string', 'max:255'],

            'sort_order' => ['nullable', 'integer'],
        ];

        $data = $request->validate($rules);

        /*
        |--------------------------------------------------------------------------
        | Upload Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image_path')) {

            $path = $request->file('image_path')
                ->store('gallery', 'public');

            $data['image_path'] = 'storage/' . $path;
        } elseif ($galleryImage) {

            // Keep existing image when no new image is uploaded
            $data['image_path'] = $galleryImage->image_path;
        }

        return $data;
    }
}

