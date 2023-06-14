<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    public function index()
    {
        $user_id = Auth::guard('web')->user()->id;

        // $submissions = Submission::whereHas('gradings')->get();
        // dd($submissions);
        $submissions = Submission::where('user_id', $user_id)
        ->whereHas('gradings')->get();

        return view('user.grade.index', compact('submissions'));
    }

    public function show(Submission $submission)
    {
        $user_id = Auth::guard('web')->user()->id;

        $submissions = Submission::where('user_id', $user_id)
        ->whereHas('gradings')->get();

        if (!$submissions->contains($submission)) {
            return abort(404);
        }

        $gradings = $submission->gradings;

        return view('user.grade.show', compact('gradings'));
    }
}
