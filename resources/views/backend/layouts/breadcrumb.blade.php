@php
    use Illuminate\Support\Facades\Route;
    $nameRoute = Route::currentRouteName();

    $partsName = explode('.', $nameRoute);
    $head = head($partsName);
    $tail = end($partsName);
    array_shift($partsName);
    array_pop($partsName);

@endphp

<nav aria-label="breadcrumb">
    <ol class="breadcrumb-header breadcrumb breadcrumb-style2">
        <li class="breadcrumb-item">
            <a href="#">{{ $head }}</a>
        </li>
        @if($partsName != null)
        @foreach($partsName as $name)
                <li class="breadcrumb-item">
                    <a href="#">{{ $name }}</a>
                </li>
        @endforeach
        @endif
        <li class="breadcrumb-item active">{{ $tail }}</li>
    </ol>
</nav>
