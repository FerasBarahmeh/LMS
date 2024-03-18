@props(['submitWhenChange' => false, 'IdFormTarget' => false])

<div @class(['position-relative d-flex flex-column justify-content-center align-items-center gap-10 border p-2 rad-5'])>
    <label @class(['input-file-label w-100 d-flex gap-10 cursor-pointer m-0 justify-content-center align-items-center'])>
        <input {{ $attributes->merge(['class' => 'd-none input-file', 'type' => 'file']) }}/>
        {{ $attributes['title'] }} {!! $content ?? '<i class="fa fa-upload"></i>' !!}
    </label>
</div>
