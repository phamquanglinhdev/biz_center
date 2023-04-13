<?php

namespace App\Domain\Grades\Provider;

use App\Domain\Grades\Contract\GradeRepositoryInterface;
use App\Domain\Grades\Contract\StaffRepositoryInterface;
use App\Domain\Grades\Contract\StudentRepositoryInterface;
use App\Domain\Grades\Contract\SupporterRepositoryInterface;
use App\Domain\Grades\Contract\TeacherRepositoryInterface;
use App\Domain\Grades\Repositories\GradeRepository;
use App\Domain\Grades\Repositories\StaffRepository;
use App\Domain\Grades\Repositories\StudentRepository;
use App\Domain\Grades\Repositories\SupporterRepository;
use App\Domain\Grades\Repositories\TeacherRepository;
use Illuminate\Support\ServiceProvider;

class GradeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            StudentRepositoryInterface::class,
            StudentRepository::class,
        );
        $this->app->singleton(
            GradeRepositoryInterface::class,
            GradeRepository::class,
        );
        $this->app->singleton(
            StaffRepositoryInterface::class,
            StaffRepository::class,
        );
        $this->app->singleton(
            TeacherRepositoryInterface::class,
            TeacherRepository::class,
        );
        $this->app->singleton(
            SupporterRepositoryInterface::class,
            SupporterRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
