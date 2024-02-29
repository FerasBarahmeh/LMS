<?php

namespace App\Providers;

use App\Interfaces\Repositories\DB\Admins\AdminInterface;
use App\Interfaces\Repositories\DB\Admins\InstructorInterface;
use App\Interfaces\Repositories\DB\Admins\ProfileInterface;
use App\Interfaces\Repositories\DB\Admins\SocialMediaAccountInterface;
use App\Interfaces\Repositories\DB\Admins\StudentInterface;
use App\Interfaces\Repositories\DB\Instructor\CoursesInterface;
use App\Repositories\Admins\AdminRepositories;
use App\Repositories\Admins\InstructorRepositories;
use App\Repositories\Admins\StudentRepositories;
use App\Repositories\Instructors\CoursesRepositories;
use App\Repositories\ProfileRepositories;
use App\Repositories\SocialMediaAccountRepositories;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SocialMediaAccountInterface::class, SocialMediaAccountRepositories::class);
        $this->app->bind(InstructorInterface::class, InstructorRepositories::class);
        $this->app->bind(StudentInterface::class, StudentRepositories::class);
        $this->app->bind(ProfileInterface::class, ProfileRepositories::class);
        $this->app->bind(AdminInterface::class, AdminRepositories::class);
        $this->app->bind(CoursesInterface::class, CoursesRepositories::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
