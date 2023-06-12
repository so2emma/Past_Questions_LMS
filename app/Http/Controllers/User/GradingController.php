<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Grading;
use App\Models\Question;
use App\Models\Submission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradingController extends Controller
{
    public function display_submission(Submission $submission)
    {
        if (!($submission->user_id == Auth::guard('web')->user()->id)) {
            return redirect()
                ->route('user.submission.create', ['quetsion' => $submission->question_id])
                ->with('failure', 'This action cannot be performed make a submission to perform peer grading');
        }

        $user = auth()->user();

        $questionId = Question::where('id', $submission->question->id)->first()->id;

        $does_not_have_grading = Submission::whereHas('question', function ($query) use ($questionId) {
            $query->where('id', $questionId);
        })
            ->where(function ($query) {
                $query->whereDoesntHave('gradings');
            })
            ->where('user_id', '!=', $user->id)
            ->inRandomOrder()
            ->get();

        $has_grading = Submission::whereHas('question', function ($query) use ($questionId) {
            $query->where('id', $questionId);
        })
            ->has('gradings', '<', 3)
            ->whereHas('gradings', function ($query) use ($user) {
                $query->where('user_id', '!=', $user->id);
            })
            ->where('user_id', '!=', $user->id)
            ->inRandomOrder()
            ->get();


        $peer_submission = $has_grading->merge($does_not_have_grading);


        if ($peer_submission->isEmpty()) {
            return redirect()->back()->with('failure', 'No submission is currently available');
        }

        $peer_submission = $peer_submission->first();


        return view('user.gradings.show', compact('peer_submission', 'submission'));
    }

    public function store_grade(Request $request, Submission $submission)
    {
        $formInput = $request->validate([
            'score' => 'required|numeric|min:10|max:100',
            'remark' => 'required|string'
        ]);

        Grading::create([
            'user_id' => Auth::guard('web')->user()->id,
            'submission_id' => $submission->id,
            'score' => $formInput['score'],
            'remark' => $formInput['remark']
        ]);

        return redirect()->route('user.show.question', ['question' => $submission->question->id])->with('success', 'Grading Was Successful');
    }
}
