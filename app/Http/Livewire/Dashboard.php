<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Livewire\Component;

class Dashboard extends Component
{
    public ?string $date = null;

    public function render()
    {
        return view('livewire.dashboard', [
            'bookings' => $this->filterBookings(),
        ]);
    }

    private function filterBookings(): Paginator
    {
        $today = Carbon::today();
        $bookings = Booking::where('completed', false);

        // When date is selected, then fetch bookings for the particular date, otherwise fetch bookings from the current date
        if ($this->date) {
            $bookings->whereDate('date', $this->date);
        } else {
            $bookings->where('date', '>=', $today);
        }

        // Order it from current date up, and also order by time
        return $bookings->orderBy('date', 'ASC')
                        ->orderBy('slot_id', 'ASC')
                        ->simplePaginate(10);
    }
}
