<?php

namespace App\Http\Controllers\Instructors;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteLectureRequest;
use App\Models\Lecture;
use App\Traits\Controllers\FlashMessages;
use Illuminate\Http\RedirectResponse;

class LectureController extends Controller
{
    use FlashMessages;

    public function __construct()
    {
        $this->messages = [
            'delete-lecture-success' => 'Success delete lecture for this course',
        ];
    }

    /**
     * Delete Lecture
     */
    public function destroy(DeleteLectureRequest $request, $id): RedirectResponse
    {
        $lecture = Lecture::find($id)->delete();
        return $this->backWith('delete-lecture-success');
    }
}
