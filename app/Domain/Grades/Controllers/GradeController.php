<?php

namespace App\Domain\Grades\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Grades\Services\GradeServices;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    private GradeServices $gradeServices;

    /**
     * @param GradeServices $gradeServices
     */
    public function __construct(GradeServices $gradeServices)
    {
        $this->gradeServices = $gradeServices;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->gradeServices->getListGrades($request->all());
        }
//        dd($this->gradeServices->getListGrades($request->all()));
        return view("backend.grades.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entry = $this->gradeServices->setupCreateOperation();
        return view("operations.create", ['entry' => $entry]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->gradeServices->createNewGrade($request->except("_token"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $entry  = $this->gradeServices->setupUpdateOperation($id);
        return view("operations.edit",['entry'=>$entry]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->gradeServices->updateGrade($id,$request->except("_method","_token"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->gradeServices->deleteGrade($id);
    }
}
