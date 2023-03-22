<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlockedSlotRequest;
use App\Models\BlockedSlot;
use App\Models\Slot;

class BlockedSlotController extends Controller
{
    public function index()
    {
        $blockedSlots = BlockedSlot::get();

        return view('blocked-slot.index', compact('blockedSlots'));
    }
    
    public function create()
    {
        $slots = Slot::get();

        return view('blocked-slot.form', compact('slots'));
    }
    
    public function store(CreateBlockedSlotRequest $request)
    {
        BlockedSlot::create($request->all());

        return redirect()->route('blocked-slots.index');
    }

    public function destroy(BlockedSlot $blockedSlot)
    {
        $blockedSlot->delete();

        return back();
    }
}
