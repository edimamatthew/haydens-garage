<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockedSlot extends Model
{
    protected $guarded = [];

    protected $casts = [
        'date' => 'date',
    ];

    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }
}
