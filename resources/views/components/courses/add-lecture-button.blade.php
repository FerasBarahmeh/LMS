<x-modals.buttons.horizontal {{ $attributes->merge(['class' => 'bg-transparent text-dark']) }} :dataEffect="'add-lecture'">
    <i class="fa fa-{{ $attributes['icon'] }} fa-15"></i>
    {{ $slot }}
</x-modals.buttons.horizontal>
