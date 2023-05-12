<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colleges = College::all();
        return view('admin.colleges.index', compact('colleges'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.colleges.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $formInput = $request->validate([
            'name' => 'required',
            'abbr' => 'required',
            'description' => 'nullable'
        ]);

        College::create($formInput);

        return redirect()->route('admin.colleges.index')->with('success', 'College Created successfully');

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
    public function edit(College $college)
    {
        return view('admin.colleges.edit', compact('college'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, College $college)
    {
        $formInput = $request->validate([
            'name' => 'required',
            'abbr' => 'required',
            'description' => 'nullable'
        ]);

        $college->update($formInput);

        return redirect()->route('admin.colleges.index')->with('success', 'College Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        College::destroy($id);
        return redirect()->route('admin.colleges.index')->with('success', 'College deleted successfully');

    }
}
