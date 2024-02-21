<div class="main-img-user profile-user position-relative " >
    <form method="post" >
        <label for="profile-img">
            <img alt="" src="{{ phantomImagePicker(user()->getFirstMediaUrl(Collection::Users->value) ) }}" class="profile-picture-uploaded">
            <i class="fas fa-camera text-dark" @style(['position: absolute; top: 5px; right: 0; background-color: #eee; padding: 10px; border-radius: 50%;'])></i>
            <input type="file" name="profile-img" id="profile-img" style="display:none;">
        </label>
    </form>
</div>

<x-modal-button :dataTarget="'cropper-preview-modal'" :id="'display-preview-modal-btn'" @style(['display: none;']) />



<!-- Start change profile picture -->
<x-modal  id="cropper-preview-modal">
    <div class="modal-header">
        <h6 class="modal-title">Crop your profile picture</h6>
        <x-close-modal-header-button :id="'header-cansel-preview-btn'"/>
    </div>
    <div class="modal-body">
        <div class="img-container">
            <div class="row">
                <div class="col-md-8">
                    <img src="" id="sample-img" alt=''  @style(['	display: block; max-width: 100%;'])/>
                </div>
                <div class="col-md-4" @style(['display: flex; justify-content: center;'])>
                    <div class="preview" @style(['overflow: hidden; width: 160px;  height: 160px; margin: 10px; border: 1px solid red;'])></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <x-primary-button :content="'Crop'" :id="'crop-btn'"/>
        <x-close-modal-footer-button :content="'Un Change'" id="footer-cansel-preview-btn"/>
    </div>
</x-modal>
<!-- End change profile picture -->


@push('css')
    <link rel="stylesheet" href="{{ asset('cropper/css/cropper.min.css') }}">
@endpush
@push('js')
    <!-- variables -->
    <script>
        let route = @js(route('profile.change.profile.picture'));
        let method = 'POST';
        let csrf = '{{ csrf_token() }}';
    </script>
    <!-- Cropper -->
    <script src="{{ asset('cropper/js/cropper.min.js') }}"></script>
    <script src="{{ asset('cropper/js/handel.js') }}"></script>
@endpush
