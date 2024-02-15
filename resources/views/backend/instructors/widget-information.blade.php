@props([
    'instructor'
])

<x-modal :id="'show-info-' . $instructor->id" >
    <div class="modal-header">
        <h6 class="modal-title text-capitalize ">Information <span class="text-primary">{{ $instructor->username }}</span> Instructor</h6>
        <x-close-modal-header-button />
    </div>
    <div class="modal-body ">
        <div class="rounded-5">

            <div class="row flex justify-content-center" @style(['background-color: #ecf0fa;'])>
                <div class="col-3 border-right border-secondary border-right-1 pt-2 pb-2 text-capitalize">column</div>
                <div class="col-9 pt-2 pb-2 text-capitalize">value</div>
            </div>

            <div class="row flex justify-content-center border-top border-secondary border-top-1">
                <div class="col-3 border-right border-secondary border-right-1 pt-2 pb-2">Name</div>
                <div class="col-9 pt-2 pb-2">{{ $instructor->name }}</div>
            </div>

            <div class="row flex justify-content-center border-top border-secondary border-top-1">
                <div class="col-3 border-right border-secondary border-right-1 pt-2 pb-2">Username</div>
                <div class="col-9 pt-2 pb-2">{{ $instructor->username }}</div>
            </div>

            <div class="row flex justify-content-center border-top border-secondary border-top-1">
                <div class="col-3 border-right border-secondary border-right-1 pt-2 pb-2">E-mail</div>
                <div class="col-9 pt-2 pb-2">{{ $instructor->email }}</div>
            </div>

            <div class="row flex justify-content-center border-top border-secondary border-top-1">
                <div class="col-3 border-right border-secondary border-right-1 pt-2 pb-2">Privilege</div>
                <div class="col-9 pt-2 pb-2">{{ $instructor->privilege }}</div>
            </div>
            <div class="row flex justify-content-center border-top border-secondary border-top-1">
                <div class="col-3 border-right border-secondary border-right-1 pt-2 pb-2">Status</div>
                <div class="col-9 pt-2 pb-2 text-capitalize {{ $instructor->status === \App\Enums\Status::Active->value ? 'text-success' : 'text-danger'  }}">{{ $instructor->status }}</div>
            </div>
            <div class="row flex justify-content-center border-top border-secondary border-top-1">
                <div class="col-3 border-right border-secondary border-right-1 pt-2 pb-2">Theme</div>
                <div class="col-9 pt-2 pb-2">{{ $instructor->theme === \App\Enums\Theme::Light->value ?  \App\Enums\Theme::Light->name : \App\Enums\Theme::Dim->name }}</div>
            </div>

            <div class="row flex justify-content-center border-top border-secondary border-top-1">
                <div class="col-3 border-right border-secondary border-right-1 pt-2 pb-2">Created At</div>
                <div class="col-9 pt-2 pb-2">{{ \Illuminate\Support\Carbon::parse($instructor->created_at)->format('Y-M-d   h:i a') }}</div>
            </div>

            <div class="row flex justify-content-center border-top border-secondary border-top-1">
                <div class="col-3 border-right border-secondary border-right-1 pt-2 pb-2">Updated At</div>
                <div class="col-9 pt-2 pb-2">{{ \Illuminate\Support\Carbon::parse($instructor->updated_at)->format('Y-M-d   h:i a') }}</div>
            </div>


        </div>
    </div>

    <div class="modal-footer">
        <x-close-modal-footer-button :content="'close'"/>
    </div>
</x-modal>
