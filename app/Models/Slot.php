<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Slot extends Model
{
    protected $casts = [
        'start_time' => 'datetime:H:i:s',
        'end_time' => 'datetime:H:i:s',
    ];

    public static function getAvailableSlots(string|Carbon $date): Collection
    {
        // Convert the date string to a Carbon object
        if (! $date instanceof Carbon) {
            $date = new Carbon($date);
        }

        // Check if the date is blocked for the whole day
        $blockedSlot = BlockedSlot::whereDate('date', $date->toDateString())
            ->whereNull('slot_id')
            ->first();
        
        if ($blockedSlot) {
            return collect();
        }

        // Check if the date is tied to a specific slot that is blocked
        $blockedSlots = BlockedSlot::whereDate('date', $date->toDateString())
            ->whereNotNull('slot_id')
            ->pluck('slot_id')
            ->toArray();

        // Get all slot ids of the bookings for that date
        $bookedSlots = Booking::whereDate('date', $date->toDateString())
            ->pluck('slot_id')
            ->toArray();

        // Get the available slots for the given date
        $slots = Slot::whereNotIn('id', $bookedSlots)
            ->whereNotIn('id', $blockedSlots)
            ->get();

        return $slots;
    }
}
