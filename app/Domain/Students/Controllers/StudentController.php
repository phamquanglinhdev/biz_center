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

    public function index()
    {

        return view("backend.students.index");
    }

    public function list()
    {
        return response()->json([
            'data' => $this->studentService->getListStudents()
        ]);
    }

    public function create()
    {
        return view("backend.students.create");
    }

    public function store(Request $request)
    {
        return $this->studentService->createStudent($request->input());
    }
}
