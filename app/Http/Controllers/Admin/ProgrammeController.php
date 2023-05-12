<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programmes = Programme::all();
        return view('admin.programmes.index', compact('programmes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.programmes.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $formInput = $request->validate([
            'name' => 'required',
            'department_id' => 'required',
            'abbr' => 'required',
            'description' => 'nullable'
        ]);

        Programme::create($formInput);

        return redirect()->route('admin.programmes.index')->with('success', 'Programme Created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Programme $programme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programme $programme)
    {
        $departments = Department::all();
        return view('admin.programmes.edit', compact('programme', 'departments'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Programme $programme)
    {
        $formInput = $request->validate([
            'name' => 'required',
            'department_id' => 'required',
            'abbr' => 'required',
            'description' => 'nullable'
        ]);

        $programme->update($formInput);

        return redirect()->route('admin.programmes.index')->with('success', 'Programme updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programme $programme)
    {
        $programme->delete();
        return redirect()->route('admin.programmes.index')->with('success', 'Programme deleted successfully');
    }
}
