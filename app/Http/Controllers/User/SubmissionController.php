<?php

namespace App\Http\Controllers\User;

use App\Models\Question;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $submissions = Auth::guard('web')->user()->submissions;
        return view('user.submissions.index', compact('submissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Question $question)
    {
        $user = Auth::guard('web')->user();

        $existingSubmission = Submission::where('user_id', $user->id)
            ->where('question_id', $question->id)
            ->first();

        if ($existingSubmission) {
            return redirect()->back()->with('failure', 'You have already submitted a solution for this question.');
        }

        return view('user.submissions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Question $question, Request $request)
    {
        $user = Auth::guard('web')->user();

        $existingSubmission = Submission::where('user_id', $user->id)
            ->where('question_id', $question->id)
            ->first();

        if ($existingSubmission) {
            return redirect()->back()->with('failure', 'You have already submitted a solution for this question.');
        }

        $request->validate([
            'file' => 'required|mimes:pdf|max:2048'
        ]);


        $destination_name = 'Submissions/' . str_replace(' ', '', $question->course->course_code) . '/' . $question->session->session_name;
        $file_name = $user->id . '-' . $question->session->session_name . '.' . $request->file->getClientOriginalExtension();

        if ($request->file('file')) {
            $path = $request->file('file')->storeAs($destination_name, $file_name);

            Submission::create([
                'user_id' => $user->id,
                'question_id' => $question->id,
                'path' => $path
            ]);

            return redirect()->route('user.show.question', ['question' => $question->id])
                ->with('success', 'Solution submitted Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        return view('user.submissions.show', compact('submission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        return view('user.submissions.edit', compact('submission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submission $submission)
    {
        $user = Auth::guard('web')->user();

        if ($submission->user_id !== $user->id) {
            return abort(404);
        }

        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $question = $submission->question;

        if ($request->hasFile('file')) {
            Storage::delete($submission->path);

            $destinationName = 'Submissions/' . str_replace(' ', '', $question->course->course_code) . '/' . $question->session->session_name;
            $fileName = $user->id . '-' . $question->session->session_name . '.' . $request->file->getClientOriginalExtension();

            $path = $request->file('file')->storeAs($destinationName, $fileName);

            $submission->path = $path;
            $submission->save();

            return redirect()->route('user.show.question', ['question' => $question->id])
                ->with('success', 'Solution updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        $user = Auth::guard('web')->user();

        if ($submission->user_id !== $user->id) {
            return abort(404);
        }

        Storage::delete($submission->path);
        $submission->delete();

        return redirect()->back()->with('success', 'Submission deleted successfully');
    }

}
