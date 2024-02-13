<?php

namespace App\Providers;

use App\Interfaces\Repositories\Admins\DBAdminInterface;
use App\Interfaces\Repositories\Admins\DBInstructorInterface;
use App\Interfaces\Repositories\Admins\DBStudentInterface;
use App\Repositories\Admins\AdminRepositories;
use App\Repositories\Admins\InstructorRepositories;
use App\Repositories\Admins\StudentRepositories;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DBAdminInterface::class, AdminRepositories::class);
        $this->app->bind(DBStudentInterface::class, StudentRepositories::class);
        $this->app->bind(DBInstructorInterface::class, InstructorRepositories::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
