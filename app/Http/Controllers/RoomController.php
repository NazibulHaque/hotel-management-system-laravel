<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::published()->orderBy('sort_order')->get();

        return view('rooms.index', compact('rooms'));
    }
}
