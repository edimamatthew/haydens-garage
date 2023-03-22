<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Blocked slots
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-between items-center px-6 pt-6">
                    <h1 class="text-2xl font-medium text-gray-900 dark:text-white"></h1>
            
                    <x-link-primary link="{{ route('blocked-slots.create') }}">
                        Block new slot
                    </x-link-primary>
                </div>

                <div class="relative overflow-x-auto mt-8">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Slot
                                </th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($blockedSlots->isNotEmpty())
                                @foreach ($blockedSlots as $blockedSlot)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $blockedSlot->date->format('Y-m-d') }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $blockedSlot->slot?->start_time->format('h:i a') }} - {{ $blockedSlot->slot?->end_time->format('h:i a') }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="{{ route('blocked-slots.delete', $blockedSlot->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="3" class="text-center py-4">No result found</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
  