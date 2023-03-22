<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'vehicle_make',
        'vehicle_model',
        'date',
        'slot_id',
        'completed',
    ];

    protected $casts = [
        'date' => 'date',
        'status' => 'boolean',
    ];

    public function getDateAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }
}
