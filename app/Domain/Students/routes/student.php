<?php

use App\Domain\Students\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin/student")->group(function () {
    Route::get("/", [StudentController::class, "index"])->name("backend.students.index");
    Route::get("/create", [StudentController::class, "create"])->name("backend.students.create");
    Route::post("/create", [StudentController::class, "store"])->name("backend.students.store");
    Route::get("/{id}/edit", [StudentController::class, "edit", "id"])->name("backend.students.edit");
    Route::put("/update", [StudentController::class, "update"])->name("backend.students.update");
    Route::delete("/", [StudentController::class, "destroy"])->name("backend.students.destroy");
});
