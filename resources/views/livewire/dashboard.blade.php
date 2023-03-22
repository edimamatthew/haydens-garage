<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-end">
                    <div class="w-64">
                        <x-input id="date" class="block mt-1 w-full" type="date" name="date" wire:model="date" min="{{ date('Y-m-d') }}" helpText="Filter by date" />
                    </div>
                </div>
                <div class="relative overflow-x-auto mt-8">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Phone number
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Vehicle make
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Vehicle model
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date/Slot
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($bookings->isNotEmpty())
                                @foreach ($bookings as $booking)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $booking->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            <a href="tel:{{ $booking->phone_number }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $booking->phone_number }}</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="mailto:{{ $booking->email }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $booking->email }}</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $booking->vehicle_make }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $booking->vehicle_model }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $booking->date->format('Y-m-d') }}<br>
                                            {{ $booking->slot->start_time->format('h:i a') }} - {{ $booking->slot->end_time->format('h:i a') }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="6" class="text-center pt-4">No result found</td>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="my-5 mx-5">
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
  
