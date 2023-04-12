<?php

use App\Domain\Staffs\Controller\StaffController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin")->group(function () {
    Route::resource("staffs", StaffController::class, [
        'as' => 'backend'
    ]);
});
