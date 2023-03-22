<?php

namespace App\Http\Livewire;

use App\Mail\AdminBookingNotification;
use App\Mail\UserBookingNotification;
use App\Models\Booking;
use App\Models\Slot;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Livewire\Component;

class BookingForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone_number = '';
    public string $vehicle_make = '';
    public string $vehicle_model = '';
    public ?string $date = null;
    public ?Collection $slots = null;
    public ?int $slot_id = null;

    protected function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email:rfc,dns'],
            'phone_number' => ['required', 'string'],
            'vehicle_make' => ['required', 'string'],
            'vehicle_model' => ['required', 'string'],
            'date' => ['required', 'date', 'date_format:Y-m-d', 'after_or_equal:today'],
            'slot_id' => ['required', Rule::in(Slot::getAvailableSlots($this->date)->pluck('id')->toArray())],
        ];
    }

    public function render()
    {
        $this->slots = $this->date ? Slot::getAvailableSlots($this->date) : null;

        return view('livewire.booking-form', [
            'slots' => $this->slots,
        ])->layout('layouts.guest');
    }

    public function submit(): void
    {
        $data = $this->validate();

        $booking = Booking::create($data);

        // Possibly extend it by adding the booking to the user and admin's calendar?

        // Send notification to the user
        Mail::to($booking->email)->send(new UserBookingNotification($booking));

        // A proper auth setup needs to be done to determine the admin. For now, I simply added is_admin boolean column
        $admin = User::admin()->first();
        if ($admin) {
            Mail::to($admin)->send(new AdminBookingNotification($booking));
        }

        session()->flash('success', 'Your booking has been submitted successfully!');

        $this->reset();
    }
}
