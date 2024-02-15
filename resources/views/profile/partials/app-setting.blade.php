@php use App\Enums\Theme; @endphp
<div class="card p-4">
    <div class="card-body p-0">
        <div class="main-content-label ">
            App Theme
        </div>
        <p class="mg-b-20">Personalize Your Experience: Choose a Theme that suits your style and comfort in
            Settings.</p>
        <form method="post" action="{{ route('user.change.theme') }}" >
            @csrf @method('put')

            <div class="row">
                <div class="parsley-select col-lg-9 col-md-8" id="slWrapper">
                    <x-input-select name="theme">
                        <x-option-select :content="'dim'" :value="Theme::Dim->value"
                                         :selected="Theme::Dim->value === auth()->user()->theme"/>
                        <x-option-select :content="'light'" :value='Theme::Light->value'
                                         :selected="Theme::Light->value === auth()->user()->theme"/>
                    </x-input-select>
                    <div id="slErrorContainer">
                        <x-alerts.sweets.default-popup
                            :title="'Fail Change Theme'"
                            :fail="session('fail-change-theme')"
                        />
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mg-t-10 mg-sm-t-0">
                    <x-primary-button>change</x-primary-button>
                </div>
            </div>
        </form>
    </div>
</div>
