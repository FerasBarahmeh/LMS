@php use Illuminate\Support\Carbon; @endphp
<div class="header">
    <h4 class="fw-light">Main Information User</h4>
</div>
<div class="rounded-5">
    <div class="row flex justify-content-center" @style(['background-color: #ecf0fa;'])>
        <div class="col-2 border-right border-secondary border-right-1 pt-2 pb-2 text-capitalize text-center">column
        </div>
        <div class="col-10 pt-2 pb-2 text-capitalize">value</div>
    </div>

    <div class="row flex justify-content-center border-top border-secondary border-top-1">
        <div class="col-2 border-right border-secondary border-right-1 pt-2 pb-2 text-center">Name</div>
        <div class="col-10 pt-2 pb-2">{{ $user->name }}</div>
    </div>

    <div class="row flex justify-content-center border-top border-secondary border-top-1">
        <div class="col-2 border-right border-secondary border-right-1 pt-2 pb-2 text-center">Username</div>
        <div class="col-10 pt-2 pb-2">{{ $user->username }}</div>
    </div>

    <div class="row flex justify-content-center border-top border-secondary border-top-1">
        <div class="col-2 border-right border-secondary border-right-1 pt-2 pb-2 text-center">E-mail</div>
        <div class="col-10 pt-2 pb-2">{{ $user->email }}</div>
    </div>

    <div class="row flex justify-content-center border-top border-secondary border-top-1">
        <div class="col-2 border-right border-secondary border-right-1 pt-2 pb-2 text-center">Privilege</div>
        <div class="col-10 pt-2 pb-2">{{ $user->privilege }}</div>
    </div>
    <div class="row flex justify-content-center border-top border-secondary border-top-1">
        <div class="col-2 border-right border-secondary border-right-1 pt-2 pb-2 text-center">Status</div>
        <div
            class="col-10 pt-2 pb-2 text-capitalize {{ $user->status === Status::Active->value ? 'text-success' : 'text-danger'  }}">{{ $user->status }}</div>
    </div>
    <div class="row flex justify-content-center border-top border-secondary border-top-1">
        <div class="col-2 border-right border-secondary border-right-1 pt-2 pb-2 text-center">Theme</div>
        <div
            class="col-10 pt-2 pb-2">{{ $user->theme === Theme::Light->value ?  Theme::Light->name : Theme::Dim->name }}</div>
    </div>

    <div class="row flex justify-content-center border-top border-secondary border-top-1">
        <div class="col-2 border-right border-secondary border-right-1 pt-2 pb-2 text-center">Created At</div>
        <div
            class="col-10 pt-2 pb-2">{{ Carbon::parse($user->created_at)->format('Y-M-d   h:i a') }}</div>
    </div>

    <div class="row flex justify-content-center border-top border-secondary border-top-1">
        <div class="col-2 border-right border-secondary border-right-1 pt-2 pb-2 text-center">Updated At</div>
        <div
            class="col-10 pt-2 pb-2">{{ Carbon::parse($user->updated_at)->format('Y-M-d   h:i a') }}</div>
    </div>


</div>
