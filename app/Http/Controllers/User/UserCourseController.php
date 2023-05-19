<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseSearchRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    public function view_course()
    {
        return view('user.enrollment.enroll');
    }

    public function search_course(CourseSearchRequest $request)
    {
        $courses = $request->search();
        return view('user.enrollment.enroll', compact('courses'));
    }

    public function enroll(Course $course)
    {
        // dd($course);
        $user = Auth::guard('web')->user();
        $user->courses()->attach($course->id);

        return redirect()->back()->with('success', 'Enrolled in the course successfully!');
    }

    public function unenroll(Course $course)
    {
        $user = Auth::guard('web')->user();
        $user->courses()->dettach($course->id);

        return redirect()->back()->with('success', 'Unenrolled from the course successfully!');
    }
}
