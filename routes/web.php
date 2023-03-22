<?php

use App\Http\Controllers\BlockedSlotController;
use App\Http\Livewire\BookingForm;
use App\Http\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', BookingForm::class)->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::resource('blocked-slots', BlockedSlotController::class);

    // Extra route below created because resource forces deleting as a post request (via form), and I just want to use a get request
    Route::get('blocked-slots/{blockedSlot}/delete', [BlockedSlotController::class, 'destroy'])->name('blocked-slots.delete');
});
