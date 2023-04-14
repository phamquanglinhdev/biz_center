<?php

use App\Domain\Teachers\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin")->group(function (){
    Route::resource("teachers", TeacherController::class,[
        'as' => 'backend'
    ]);
});
