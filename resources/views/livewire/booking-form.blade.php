<div>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <x-logo />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <x-validation-errors class="mb-4" />

            @if (session('success'))
                <div class="bg-green-500 dark:bg-green-300 text-white dark:text-black px-4 py-3 rounded-md shadow-md mb-4">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <p class="text-lg font-medium text-gray-900 dark:text-gray-100">Hello, welcome to Hayden's Garage.</p>
            <p class="mt-1 mb-4 text-sm text-gray-600 dark:text-gray-400">Make a booking by filling the form below.</p>

            <form wire:submit.prevent="submit">
                <x-input-with-label key="name" name="Name" />
                <x-input-with-label key="email" name="Email address" />
                <x-input-with-label key="phone_number" name="Phone number" />

                <div class="grid md:grid-cols-2 md:gap-6">
                    <x-input-with-label key="vehicle_make" name="Vehicle make" />
                    <x-input-with-label key="vehicle_model" name="Vehicle model" />
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="mb-4">
                        <x-label for="date" value="Date" />
                        <x-input id="date" class="block mt-1 w-full" type="date" name="date" wire:model="date" min="{{ date('Y-m-d') }}" />
                    </div>
                    <div class="mb-4">
                        <x-label for="slot_id" value="Slot" />
                        <select name="slot_id" id="slot_id" {{ ! $date ? 'disabled' : '' }} wire:model="slot_id" class="block mt-1 w-full 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'">
                            <option value="">-- Please select --</option>
                            @if ($slots?->isNotEmpty())
                                @foreach ($slots as $slot)
                                    <option value="{{ $slot->id }}">{{ $slot->start_time->format('h:i a') }} - {{ $slot->end_time->format('h:i a') }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if ($date)
                            @if ($slots->isEmpty())
                                <p class="mt-2 text-sm text-red-500 dark:text-red-400">No available slot</p>
                            @else
                                <p class="mt-2 text-sm text-green-500 dark:text-green-400">Select a slot</p>
                            @endif
                        @else
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Select date to see slots</p>
                        @endif
                    </div>
                </div>

                <div class="flex items-center justify-center mt-4">
                    <x-button class="mb-4">
                        Book now
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
