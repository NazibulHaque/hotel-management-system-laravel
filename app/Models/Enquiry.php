<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'guests', 'checkin', 'checkout',
        'room_id', 'message', 'status',
    ];

    protected $casts = [
        'checkin' => 'date',
        'checkout' => 'date',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
