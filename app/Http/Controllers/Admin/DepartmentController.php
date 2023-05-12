<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colleges = College::all();
        return view('admin.departments.create', compact('colleges'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $formInput = $request->validate([
            'name' => 'required',
            'college_id' => 'required',
            'abbr' => 'required',
            'description' => 'nullable'
        ]);

        Department::create($formInput);

        return redirect()->route('admin.departments.index')->with('success', 'Department Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        $colleges = College::all();
        return view('admin.departments.edit', compact('department','colleges'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $formInput = $request->validate([
            'name' => 'required',
            'college_id' => 'required',
            'abbr' => 'required',
            'description' => 'nullable'
        ]);

        $department->update($formInput);

        return redirect()->route('admin.departments.index')->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('admin.departments.index')->with('success', 'Department deleted successfully');
    }
}
