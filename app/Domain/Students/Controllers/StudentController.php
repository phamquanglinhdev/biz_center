<?php

namespace App\Domain\Students\Controllers;

use App\Domain\Students\Services\StudentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private StudentService $studentService;

    /**
     * @param StudentService $studentService
     */
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index(Request $request)
    {
        $students = $this->studentService->studentTable($request->all());
        return view("backend.students.index", ["students" => $students, 'fixColumn' => 2, "tableWidth" => "100%"]);
    }

    public function create()
    {
        return view("backend.students.create");
    }

    public function store(Request $request)
    {
        return $this->studentService->createStudent($request->except('_token'));
    }

    public function edit($id)
    {
        $old = $this->studentService->getStudentById($id);
        return view("backend.students.edit", ['old' => $old]);
    }

    public function update(Request $request)
    {
        return $this->studentService->updateStudent($request->except("_token", "_method"));
    }

    public function destroy(Request $request)
    {
        return $this->studentService->deleteStudent($request->id ?? null);
    }
}
