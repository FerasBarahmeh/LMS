<form action="{{ route('user.social.media.account', $platform->id) }}" method="post">
    @csrf @method('put')
    <div class="form-group">
        <div class="row">
            <div class="col-2 d-flex align-items-center">
                <x-input-label for="{{ $platform->name }}"
                               class="form-label m-0"
                               :value="$platform->name"/>
            </div>
            <div class="col-3">
                <x-text-input type="text"
                              class="form-control"
                              :disabled="true"
                              :value="'https://www.'.    $platform->domain"
                />
            </div>
            <div class="col-3">
                <x-text-input type="text"
                              name="username"
                              class="form-control"
                              :value="old('username', $platform->user->first()->mediaAccounts->username ?? '')"
                              :placeholder="'Username'"
                />
            </div>

            <div class="col-2">
                <x-text-input type="text"
                              class="form-control"
                              :disabled="true"
                              :value="'.'.    $platform->TLD"
                />
            </div>

            <div class="col-2">
                <x-primary-button :content="'save'"/>
            </div>

        </div>
    </div>
</form>
