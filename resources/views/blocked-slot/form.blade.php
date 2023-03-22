<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Block a slot
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-between items-center px-6 pt-6">
                    <x-link-primary link="{{ route('blocked-slots.index') }}">
                        Go back
                    </x-link-primary>
                    <h1 class="text-2xl font-medium text-gray-900 dark:text-white"></h1>
                </div>

                <div class="relative overflow-x-auto mt-8 px-6">
                    <x-form action="{{ route('blocked-slots.store') }}" method="POST">
                        <x-slot name="title">
                            Block a slot
                        </x-slot>
                
                        <x-slot name="description">
                            Use this form to block a slot from your booking schedule. The slot field is optional so you can select only the day and save. However, in that case, the entire day is blocked so customers will be unable to book for the whole of that day
                        </x-slot>
                
                        <x-slot name="form">
                            <div class="col-span-6 sm:col-span-4">
                                <x-label for="date" value="Date" />
                                <x-input id="date" class="block mt-1 w-full" type="date" name="date" wire:model="date" min="{{ date('Y-m-d') }}" />
                            </div>
                
                            <div class="col-span-6 sm:col-span-4">
                                <x-label for="slot_id" value="Slot" />
                                <select name="slot_id" id="slot_id" class="block mt-1 w-full 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'">
                                    <option value="">-- Please select --</option>
                                    @foreach ($slots as $slot)
                                        <option value="{{ $slot->id }}">{{ $slot->start_time->format('h:i a') }} - {{ $slot->end_time->format('h:i a') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </x-slot>
                
                        <x-slot name="actions">
                            <x-button>
                                Save
                            </x-button>
                        </x-slot>
                    </x-form> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
  