<?php

namespace App\Providers;

use App\Domain\Grades\Interface\GradeRepositoryInterface;
use App\Domain\Grades\Repositories\GradeRepository;
use App\Domain\Students\Repositories\StudentRepository;
use App\Domain\Students\Repositories\StudentRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
