@php
    use Illuminate\Support\Facades\Route;
    $nameRoute = Route::currentRouteName();

    $partsName = explode('.', $nameRoute);
    $head = head($partsName);
    $tail = end($partsName);
    array_shift($partsName);
    array_pop($partsName);

@endphp

<nav aria-label="breadcrumb" @style(['padding: 4px; margin-top: 6px; margin-bottom: 10px'])>
    <ol class="breadcrumb-header breadcrumb breadcrumb-style2">
        <li class="breadcrumb-item" @style(['font-size: 15px;'])>
            <a href="#">{{ $head }}</a>
        </li>
        @foreach($partsName ?? [] as $name)
            <li class="breadcrumb-item" style="font-size: 15px;">
                <a href="#">{{ $name }}</a>
            </li>
        @endforeach
        <li class="breadcrumb-item active" @style(['font-size: 15px;'])>{{ $tail }}</li>
    </ol>
</nav>
