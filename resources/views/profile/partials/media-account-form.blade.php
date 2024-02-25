<form action="{{ route('user.social.media.account', $platform->id) }}" method="post">
    @csrf @method('put')
    <div class="mb-3">
        <x-input-label for="{{ $platform->name }}" class="form-label" :value="$platform->name"/>
        <div class="d-flex align-items-center" @style(['gap: 4px;'])>
            <x-text-input type="text" class="form-control" :disabled="true" :value="'https://www.'.    $platform->domain"/>
            <x-text-input type="text" name="username" class="form-control" :value="old('username', $platform->user->first()->mediaAccounts->username ?? '')" :placeholder="'Username'"/>
            <x-text-input type="text" class="form-control" :disabled="true" :value="'.'.    $platform->TLD"/>
            <x-primary-button :content="'save'"/>
        </div>
    </div>
</form>
