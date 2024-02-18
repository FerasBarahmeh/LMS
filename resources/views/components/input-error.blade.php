@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm pl-3 pr-3']) }}>
        @foreach ((array) $messages as $message)
            <li class="text-danger">{{ $message }}</li>
        @endforeach
    </ul>
@endif
