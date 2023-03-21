<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockedSlot extends Model
{
    protected $guarded = [];

    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }
}
