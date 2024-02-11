@props([
    'id',

])
<div class="modal" id="{{ $id }}">
    {{ $slot }}
</div>
