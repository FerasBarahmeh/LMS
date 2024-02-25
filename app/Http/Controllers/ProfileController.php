<?php

namespace App\Http\Controllers;

use App\Http\Requests\{AddEducationRequest,
    AddExperienceRequest,
    DeleteEducationRequest,
    DeleteExperienceRequest,
    EditEducationRequest,
    EditExperienceRequest,
    ProfileUpdateRequest,
    SocialMediaAccountsRequest,
    ToggleStatusRequest};

use App\Interfaces\Repositories\Admins\DBProfileInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    private DBProfileInterface $profile;

    public function __construct(DBProfileInterface $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        return $this->profile->index($request);
    }

    public function edit(Request $request): View
    {
        return $this->profile->edit($request);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        return $this->profile->update($request);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        return $this->profile->destroy($request);
    }

    public function changeProfilePicture(Request $request)
    {
        return $this->profile->changeProfilePicture($request);
    }

    public function toggleStatus(ToggleStatusRequest $request, string $id): RedirectResponse
    {
        return $this->profile->toggleStatus($request, $id);
    }

    public function changeTheme(Request $request): RedirectResponse
    {
        return $this->profile->changeTheme($request);
    }

    public function socialMediaAccount(SocialMediaAccountsRequest $request, string $platform): RedirectResponse
    {
        return $this->profile->socialMediaAccount($request, $platform);
    }

    public function addExperience(AddExperienceRequest $request): RedirectResponse
    {
        return $this->profile->addExperience($request);
    }

    public function editExperience(EditExperienceRequest $request, $id): RedirectResponse
    {
        return $this->profile->editExperience($request, $id);
    }

    public function deleteExperience(DeleteExperienceRequest $request, $id): RedirectResponse
    {
        return $this->profile->deleteExperience($request, $id);
    }

    public function addEducation(AddEducationRequest $request): RedirectResponse
    {
        return $this->profile->addEducation($request);
    }

    public function editEducation(EditEducationRequest $request, $id): RedirectResponse
    {
        return $this->profile->editEducation($request, $id);
    }

    public function deleteEducation(DeleteEducationRequest $request, $id): RedirectResponse
    {
        return $this->profile->deleteEducation($request, $id);
    }

}
