<?php

namespace App\Http\Controllers\User;

use App\Models\Question;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Question $question)
    {
        return view('user.submissions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Question $question, Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        $user = Auth::guard('web')->user();



        $destination_name = 'Submissions/'.str_replace(' ','',$question->course->course_code).'/'.$question->session->session_name;
        $file_name = $user->id.'-'.$question->session->session_name;

        if($request->file('file')) {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
