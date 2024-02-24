@props([
    'id',
    'route',
    'tip' => 'This is to confirm that you have requested the deletion.',
])
<x-modal :id="$id">
    <div class="modal-dialog m-0" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title text-capitalize">{{ $title ?? 'are you sure you want delete' }} </h6>
                <x-close-modal-header-button />
            </div>
            <div class="modal-body">
                <form method="post" action="{{ $route }}" class="p-6">
                    @csrf @method('delete')

                    <h2 class="text-lg font-medium text-danger">
                        {{ $subTitle ?? __('Are you sure you want to delete') }}
                    </h2>

                    <p class="mt-1 text-sm">
                        {{ $tip }}
                    </p>

                    <div class="modal-footer">
                        <x-close-modal-footer-button :content="__('cansel')"/>
                        <x-danger-button class="ms-3">
                            {{ __('Confirm') }}
                        </x-danger-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-modal>
