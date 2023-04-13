<?php

namespace App\Domain\Staffs\Controller;

use App\Domain\Staffs\Services\StaffService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    private StaffService $staffService;

    /**
     * @param StaffService $staffService
     */
    public function __construct(StaffService $staffService)
    {
        $this->staffService = $staffService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->staffService->getAllStaffToTable();
        }
        return view("backend.staffs.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("operations.create", ['entry' => $this->staffService->setupCreateOperation()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->staffService->createStaff($request->except("_token"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route("backend.staffs.index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $entry = $this->staffService->setupUpdateOperation($id);
        return view("operations.edit", ['entry' => $entry]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->staffService->updateStudent($id, $request->except("_token"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
