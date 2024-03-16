<?php

namespace App\Http\Controllers\Instructors;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteSectionRequest;
use App\Models\CourseSection;
use App\Traits\Controllers\FlashMessages;
use Illuminate\Http\RedirectResponse;

class SectionController extends Controller
{
    use FlashMessages;

    public function __construct()
    {
        $this->messages = [
            'delete-section-success' => 'Success delete section for this course',
        ];
    }

    /**
     * Delete section
     */
    public function destroy(DeleteSectionRequest $request, $id): RedirectResponse
    {
        CourseSection::find($id)->delete();
        return $this->backWith('delete-section-success');
    }

}
