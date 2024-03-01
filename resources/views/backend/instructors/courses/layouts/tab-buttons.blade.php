@php use Illuminate\Support\Facades\Route; @endphp
<div class="">
    <div class="panel panel-primary tabs-style-4">
        <div class="tab-menu-heading">
            <div class="tabs-menu ">
                <ul class="nav panel-tabs">
                    <!-- Curriculum -->
                    <li class="">
                        <a href="{{ route('instructor.courses.manage.curriculum', $course->id) }}"
                            @class(['text-white', 'bg-dark','d-flex','justify-content-around','align-items-center','flex-row-reverse','op-6' => ! Route::is('instructor.courses.manage.curriculum'), 'active' => Route::is('instructor.courses.manage.curriculum')])>
                            <i class="icon icon-folder"></i>
                            <span>Curriculum</span>
                        </a>
                    </li>

                    <!-- Settings -->
                    <li class="">
                        <a href="{{ route('instructor.courses.manage.settings', $course->id) }}"
                            @class(['text-white', 'bg-dark','d-flex','justify-content-around','align-items-center','flex-row-reverse','op-6' => ! Route::is('instructor.courses.manage.settings'), 'active' => Route::is('instructor.courses.manage.settings')])>
                            <i class="icon icon-settings"></i>
                            <span>Settings</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
