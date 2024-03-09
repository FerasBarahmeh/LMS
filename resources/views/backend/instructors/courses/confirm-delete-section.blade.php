<x-modal id="delete-section-{{$section->id}}">
    <!-- Modal head -->
    <div class="modal-header">
        <h6 class="modal-title">
            Delete <q class="text-capitalize text-primary">{{ $section->title }}</q> to teachers
        </h6>
        <x-close-modal-header-button/>
    </div>

    <!-- Modal Body -->
    <div class="modal-body">
        <form method="post" action="{{ route('instructor.courses.manage.section.delete', $section->id) }}" class="p-6">
            @csrf @method('delete')

            <h2 class="text-danger">
                {{ __('Are you sure you want delete :name section ?', [$section->title]) }}
            </h2>

            <p>{{ __('We promise students lifetime access, so courses cannot be deleted after students have enrolled.') }}</p>

            <!-- Password -->
            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="mt-3 mb-0 text-danger"/>
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-2 mb-2"
                    placeholder="{{ __('Your password to confirm operation') }}"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <x-danger-button :content=" __('delete')" class="ms-3 text-capitalize"/>
                <x-close-modal-footer-button>{{ __('close') }}</x-close-modal-footer-button>
            </div>

        </form>
    </div>
</x-modal>
