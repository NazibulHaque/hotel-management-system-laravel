<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::orderBy('sort_order')->get();

        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        $data['slug'] = Str::slug($data['name']);

        Room::create($data);

        return redirect()
            ->route('admin.rooms.index')
            ->with('success', 'Room created.');
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $data = $this->validated($request, $room);

        $data['slug'] = Str::slug($data['name']);

        $room->update($data);

        return redirect()
            ->route('admin.rooms.index')
            ->with('success', 'Room updated.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()
            ->route('admin.rooms.index')
            ->with('success', 'Room deleted.');
    }

    private function validated(
        Request $request,
        ?Room $room = null
    ): array {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'description' => ['required', 'string'],
            'size_sqm' => ['nullable', 'integer', 'min:1'],
            'sleeps' => ['required', 'integer', 'min:1', 'max:12'],
            'price_per_night' => ['required', 'numeric', 'min:0'],
            'amenities' => ['nullable', 'string'],

            'image_path' => [
                $room ? 'nullable' : 'required',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:5120',
            ],

            'sort_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload room image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')
                ->store('rooms', 'public');

            $data['image_path'] = 'storage/' . $path;
        } elseif ($room) {
            // Keep the existing image when no new image is uploaded.
            $data['image_path'] = $room->image_path;
        }

        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        $data['amenities'] = collect(
            explode(',', $data['amenities'] ?? '')
        )
            ->map(fn ($a) => trim($a))
            ->filter()
            ->values()
            ->all();

        /*
        |--------------------------------------------------------------------------
        | Other fields
        |--------------------------------------------------------------------------
        */

        $data['is_published'] = $request->boolean('is_published');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}

