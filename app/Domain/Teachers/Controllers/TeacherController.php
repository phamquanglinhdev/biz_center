<?php

namespace App\Domain\Teachers\Controllers;

use App\Domain\Teachers\Services\TeacherServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private TeacherServices $teacherServices;

    /**
     * @param TeacherServices $teacherServices
     */
    public function __construct(TeacherServices $teacherServices)
    {
        $this->teacherServices = $teacherServices;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return  $this->teacherServices->setupListOperation($request->toArray());
        }
//        dd($this->teacherServices->setupListOperation($request->toArray()));
        return view("backend.teachers.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entry = $this->teacherServices->setupCreateOperation();
        return view("operations.create",['entry'=>$entry]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->file('cv'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
