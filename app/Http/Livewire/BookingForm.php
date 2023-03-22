<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use App\Models\Slot;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Livewire\Component;

class BookingForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone_number = '';
    public string $vehicle_make = '';
    public string $vehicle_model = '';
    public string $date = '';
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
            'slots' => $this->slots
        ])->layout('layouts.guest');
    }

    public function submit()
    {
        $data = $this->validate();

        Booking::create($data);

        // Send emails to the user and the admin

        session()->flash('success', 'Your booking has been submitted successfully!');

        $this->reset();
    }
}
