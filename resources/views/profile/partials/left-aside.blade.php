<div class="col-lg-4">
    <div class="card mg-b-20">
        <div class="card-body">
            <div class="pl-0">
                <div class="main-profile-overview">

                    @include('profile.partials.change-profile-picture-section')

                    <div class="d-flex justify-content-between mg-b-20">
                        <div>
                            <h5 class="main-profile-name">{{ $user->name }}</h5>
                            <p class="main-profile-name-text">{{ $user->privilege }}</p>
                        </div>
                    </div>
                    <h6>Bio</h6>
                    <div class="main-profile-bio">
                        {{ user()->about }}
                    </div>
                    <!-- main-profile-bio -->
                    <div class="row">
                        <div class="col-md-4 col mb20">
                            <h5>947</h5>
                            <h6 class="text-small text-muted mb-0">Followers</h6>
                        </div>
                        <div class="col-md-4 col mb20">
                            <h5>583</h5>
                            <h6 class="text-small text-muted mb-0">Tweets</h6>
                        </div>
                        <div class="col-md-4 col mb20">
                            <h5>48</h5>
                            <h6 class="text-small text-muted mb-0">Posts</h6>
                        </div>
                    </div>


                </div>
                <!-- main-profile-overview -->
            </div>
        </div>
    </div>
</div>
