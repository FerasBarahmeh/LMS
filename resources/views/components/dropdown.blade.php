@props(['direction' => 'left', 'showArrow' => true])
<div>
    <div class="dropdown drop{{$direction}}">
        <x-primary-button
            @class(['dropdown-toggle' => $showArrow, ])
            aria-expanded="false"
            aria-haspopup="true"
            {{ $attributes->merge(['type' => 'button', 'class' => '', 'id'=>'drop'.$direction.'MenuButton', 'data-toggle' => 'dropdown'])}}
        >
            {{ $title }}
        </x-primary-button>

        <div
            @class(['dropdown-menu tx-13'])
            aria-labelledby="drop{{ $direction }}MenuButton"
            href="#"
        >
            {{ $links }}
        </div>


    </div>
</div>
