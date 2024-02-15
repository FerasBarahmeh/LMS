@props([
    'timeInit' => 2000,
])
@if (! $errors->isEmpty())
    @foreach($errors->messages() as $error)
        @foreach($error as $message)
            @php $timeInit += 1000 @endphp
            <x-alerts.simple-alert :fail="$message" :showTime="$timeInit"/>
        @endforeach
    @endforeach
@endif
