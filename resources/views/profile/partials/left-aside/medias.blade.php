<div class="media d-flex justify-content-center align-items-center">
    <span class="text-capitalize">{{ $media->name }}</span>
    <div class="media-body">
        <a href="https://www.{{ $media->domain }}.{{$media->TLD}}/{{$media->mediaAccounts->username }}">
            {{$media->mediaAccounts->username }} </a>
    </div>
</div>
