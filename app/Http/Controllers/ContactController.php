<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Room;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        $rooms = Room::published()->orderBy('sort_order')->get();

        return view('contact.index', compact('rooms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['nullable', 'string', 'max:40'],
            'guests' => ['required', 'integer', 'min:1', 'max:8'],
            'checkin' => ['required', 'date', 'after_or_equal:today'],
            'checkout' => ['required', 'date', 'after:checkin'],
            'room' => ['nullable', 'exists:rooms,slug'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        $room = $validated['room'] ?? null
            ? Room::where('slug', $validated['room'])->first()
            : null;

        Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'guests' => $validated['guests'],
            'checkin' => $validated['checkin'],
            'checkout' => $validated['checkout'],
            'room_id' => $room?->id,
            'message' => $validated['message'] ?? null,
        ]);

        return redirect()
            ->route('contact')
            ->with('success', "Thanks, {$validated['name']} — we've received your enquiry and will reply by email shortly.");
    }
}
