<div @class(['position-relative', ' d-flex', 'justify-content-center', 'align-items-center', 'gap-10', 'border', 'p-2', 'rad-5'])>
    <label for="input-file"
           @class(['input-file-label w-100 d-flex gap-10 cursor-pointer m-0 justify-content-center align-items-center'])
    >
        {{ $attributes['title'] }} {!! $content ?? '<i class="fa fa-upload"></i>' !!}
    </label>

    <input {{ $attributes->merge(['class' => 'd-none', 'id' => 'input-file', 'type' => 'file']) }}/>
</div>
