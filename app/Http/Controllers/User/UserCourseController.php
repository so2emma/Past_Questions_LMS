<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseSearchRequest;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $user->courses()->detach($course->id);

        return redirect()->back()->with('success', 'Unenrolled from the course successfully!');
    }

    public function enrolled_courses()
    {
        $user = Auth::guard('web')->user();
        $courses = $user->courses()->get();

        return view('user.courses.index', compact('courses'));
    }

    public function view_questions(Course $course)
    {
        $questions = $course->questions()->get();
        return view('user.questions.index', compact('course','questions'));
    }

    public function show_question(Question $question)
    {
        $submission = DB::table('submissions')
        ->where('user_id', '=', Auth::guard('web')->user()->id)
        ->where('question_id', '=', $question->id )->first();


        return view('user.questions.show', compact('question', 'submission'));
    }
}
