<div class="menu-header-content bg-primary text-left">
    <div class="d-flex">
        <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Notifications</h6>
        @if(user()->unreadNotifications->count() > 0)
            <span class="badge badge-pill badge-warning ml-auto my-auto float-right">Mark All Read</span>
        @endif
    </div>
    <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You
        have {{ user()->unreadNotifications->count()  }} unread Notifications</p>
</div>
<div class="main-notification-list Notification-scroll">

    @if( user()->unreadNotifications->count()  > 0 )
        @foreach(user()->unreadNotifications as $notification)
            <a class="d-flex p-3 border-bottom" @style(['cursor: pointer;']) >
                <div
                    class="notifyimg bg-pink" @style(['width: 50px; height: 50px; display: flex; align-items: center;'])>
                    <i class="la la-user text-white w-100 h-100 flex align-items-center justify-content-center"></i>
                </div>
                <div class="ml-3">
                    <h5 class="notification-label mb-1">{{ $notification->data['title'] }}</h5>
                    <div
                        class="notification-subtext">{{ Carbon::parse($notification->created_at)->diffForHumans() }}</div>
                </div>
                <div class="ml-auto">
                    <i class="las la-angle-right text-right text-muted"></i>
                </div>
            </a>
        @endforeach
    @else
        <span class="p-1 text-capitalize text-danger m-1">
            not reserved new notifications yet
        </span>
    @endif

</div>
<div class="dropdown-footer">
    <a href="">VIEW ALL</a>
</div>
