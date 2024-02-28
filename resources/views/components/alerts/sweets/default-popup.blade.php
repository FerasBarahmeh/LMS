@props([
    'success' => null,
    'fail' => null,
    'title' => 'Well done !',
    'successTitle' => 'Well done !',
    'failTitle' => 'Opp\'s !',
    'confirmButtonColor' => '#57a94f',
    'confirmButtonText' => 'Acknowledged',
])


@if ($success !=null)
    {{ $title = $successTitle }}
        {{ $type = 'success' }}
    @elseif ($fail != null)
    {{ $title = $failTitle }}
    {{ $type = 'danger' }}
@endif

@if ($success != null || $fail !=null)

    @push('css')
        <link href="{{asset('backend/assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
    @endpush

    @push('js')
        <script src="{{asset('backend/assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
        <script>
            swal({
                title: '{{ $title }}',
                text: '{{ $success ?? $fail }}',
                type: '{{ $type }}',
                confirmButtonColor: '{{ $confirmButtonColor }}',
                confirmButtonText: '{{ $confirmButtonText }}',
            });
        </script>
    @endpush


@endif

