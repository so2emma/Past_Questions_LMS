<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Question;
use App\Models\Session;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $sessions = Session::all();
        $questions = Question::all();
        $courses= Course::all();

        return view('admin.dashboard',compact('sessions', 'questions', 'courses'));
    }
}
