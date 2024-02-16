@props([
    'user'
])

<x-modal :id="'show-info-' . $user->id" >
    <div class="modal-header">
        <h6 class="modal-title text-capitalize ">Information <span class="text-primary">{{ $user->username }}</span> User</h6>
        <x-close-modal-header-button />
    </div>
    <div class="modal-body" @style(['overflow: scroll;'])>

        <div class="d-md-flex " @style(['gap: 10px;'])>
            <div class="">
                <div class="panel panel-primary tabs-style-4">
                    <div class="tab-menu-heading" @style(['width: 100px;'])>
                        <div class="tabs-menu ">
                            <!-- Tabs Buttons -->
                            <ul class="nav panel-tabs">
                                <li class=""><a href="#tab21" class="active" data-toggle="tab">Main info</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabs-style-4" @style(['overflow: scroll;   '])>
                <div class="panel-body tabs-menu-body" @style(['width: 1000px; padding: 5px;'])>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab21">
                            @include('backend.users.widget-main-info-section')
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="modal-footer">
        <x-close-modal-footer-button :content="'close'"/>
    </div>
</x-modal>
