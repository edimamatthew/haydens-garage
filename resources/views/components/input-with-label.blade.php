@props(['key', 'name'])

<div class="mb-4">
    <x-label for="{{ $key }}" value="{{ $name }}" />
    <x-input id="{{ $key }}" class="block mt-1 w-full" type="text" name="{{ $key }}" wire:model="{{ $key }}" />
</div>