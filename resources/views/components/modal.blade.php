@props([
    'id' => null,
])


<div
    {{ $attributes->merge(['class' => 'modal', 'id' => $id]) }}
>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            {{ $slot }}
        </div>
    </div>
</div>
