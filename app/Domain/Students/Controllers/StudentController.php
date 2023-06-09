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

    /**
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->studentService->studentTable($request->all());
        }
//        dd($this->studentService->studentTable($request->all()));
        return view("backend.students.index");
    }

    public function show($id)
    {
        $student = $this->studentService->getStudentToShow($id);
        return view("backend.students.show", ['student' => $student]);
    }

    public function create()
    {
        $entry = $this->studentService->setupCreateOperation();
        return view("operations.create", ['entry' => $entry]);
    }

    public function store(Request $request)
    {
        return $this->studentService->createStudent($request->except('_token'));
    }

    public function edit($id)
    {
        $entry = $this->studentService->setupUpdateOperation($id);
        return view("operations.edit", ['entry' => $entry]);
    }

    public function update(Request $request, string $id)
    {
        return $this->studentService->updateStudent($request->except("_token", "_method"), $id);
    }

    public function destroy(string $id)
    {
        return $this->studentService->deleteStudent($id);
    }
}
