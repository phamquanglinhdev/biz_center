<?php

use App\Domain\Students\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::prefix("/student")->group(function () {
    Route::get("/", [StudentController::class, "index"])->name("backend.students.create");
    Route::get("/list", [StudentController::class, "list"])->name("backend.students.list");
    Route::get("/create", [StudentController::class, "create"])->name("backend.students.create");
    Route::post("/create", [StudentController::class, "store"])->name("backend.students.store");
});
