<x-card-simple-collapse :id="'collapseMedia'" :title="'Social Media Accounts'">

    <x-slot name="icon">
        <i class="fa fa-layer-group"></i>
    </x-slot>

    @foreach($platforms as $platform)
        @include('profile.partials.media-account-form', ['$platform'])
    @endforeach
</x-card-simple-collapse>
