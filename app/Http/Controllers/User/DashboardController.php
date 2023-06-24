<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::guard('web')->user();
        $courses = $user->courses;

        $submissions = $user->submissions()
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $submissions_graded = Submission::where('user_id', $user->id)
            ->has('gradings')
            ->with('gradings')
            ->orderByDesc('created_at')
            ->take(5)
            ->get();


        $submissions_ungraded = Submission::where('user_id', $user->id)
        ->whereDoesntHave('gradings')
        ->take(5)
        ->get();

        // dd(count($courses));


        return view('user.dashboard', compact(
            'submissions',
            'submissions_graded',
            'submissions_ungraded',
            'courses'
        ));
    }
}
