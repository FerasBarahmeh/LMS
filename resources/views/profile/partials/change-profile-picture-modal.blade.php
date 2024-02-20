<x-modal :id="'change-profile-picture-modal'">
    <div class="modal-header">
        <h3>Change profile picture</h3>
    </div>

    <div class="modal-body">
        <form method="post" action="">
{{--            <input type="file" name="profile-picture"    id="">--}}
            <x-filepond :name="'profile-picture'"/>
        </form>
    </div>

    <div class="modal-footer">
        <x-close-modal-footer-button :content="'Close'"/>
        <x-primary-button :content="'Change'"/>
    </div>
</x-modal>
