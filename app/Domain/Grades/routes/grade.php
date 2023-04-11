<?php

use App\Domain\Grades\Controllers\GradeController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin")->group(function () {
    Route::resource("grades", GradeController::class, [
        'as' => 'backend'
    ]);
});
