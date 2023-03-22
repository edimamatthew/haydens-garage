<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\BookingForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BookingFormTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(BookingForm::class);

        $component->assertStatus(200);
    }
}
