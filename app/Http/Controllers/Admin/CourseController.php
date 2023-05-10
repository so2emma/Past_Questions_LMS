<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.show', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formInput = $request->validate([
            'name' => 'required',
            'course_code' => 'required',
            'description' => 'nullable'
        ]);

        Course::create($formInput);

        return redirect()->route('admin.courses.index')->with('success', 'Course Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $formInput = $request->validate([
            'name' => 'required',
            'course_code' => 'required',
            'description' => 'nullable'
        ]);

        $course->update($formInput);

        return redirect()->route('admin.courses.index')->with('success', 'course Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.colleges.index')->with('success', 'College deleted successfully');
    }
}
