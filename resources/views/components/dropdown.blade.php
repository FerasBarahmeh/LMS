@props(['direction' => 'left'])
<div>
    <div class="dropdown drop{{$direction}}">
        <x-primary-button
            aria-expanded="false"
            aria-haspopup="true"
            {{ $attributes->merge(['type' => 'button', 'class' => 'dropdown-toggle', 'id'=>'dropleftMenuButton', 'data-toggle' => 'dropdown'])}}
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
