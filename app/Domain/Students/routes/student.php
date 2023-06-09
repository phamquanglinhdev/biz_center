<?php

use App\Domain\Students\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin")->group(function () {
    Route::resource("students", StudentController::class, [
        'as' => 'backend'
    ]);

});
