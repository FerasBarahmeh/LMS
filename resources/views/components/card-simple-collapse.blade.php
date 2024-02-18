@props([
    'id',
    'title',
    'show'=>false,
])
<div class="card mb-0">

    <div class="card-header" id="headingTwo" role="tab">
        <a aria-controls="{{ $id }}" aria-expanded="false" class="collapsed"
           data-toggle="collapse" href="#{{ $id }}">{{ $title }}</a>
    </div>

    <div aria-labelledby="headingTwo" class="collapse {{ $show ? 'show' : '' }}" data-parent="#accordion"
         id="{{ $id }}" role="tabpanel">
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>
