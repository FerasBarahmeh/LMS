@props([
    'id',
    'title',
    'show'=>false,
])
<div class="card mb-0">

    <div class="card-header" id="headingTwo" role="tab">
        <a aria-controls="{{ $id }}"
           aria-expanded="false"
           class="collapse-btn collapsed d-flex align-items-center justify-content-between"
           @style(['gap: 10px; border-bottom: 1px solid darkgrey;'])
           data-toggle="collapse" href="#{{ $id }}"
        >

          <span @style(['display: flex; align-items: center; gap: 10px;'])>
                @isset($icon)
                  <span class="text-dark" @style(['font-size: 20px;'])>{!! $icon !!}</span>
              @endisset

            <span>{{ $title }}</span>
          </span>

            <span>
                <i class="fa fa-arrow-down arrow " ></i>
            </span>


        </a>
    </div>

    <div aria-labelledby="headingTwo" class="collapse {{ $show ? 'show' : '' }}" data-parent="#accordion"
         id="{{ $id }}" role="tabpanel">
        <div class="card-body" @style(['padding-top: 20px;'])>
            {{ $slot }}
        </div>
    </div>
</div>
