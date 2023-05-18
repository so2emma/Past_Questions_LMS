<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Question;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $sessions = Session::all();
        return view('admin.questions.create', compact('courses', 'sessions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formInput = $request->validate([
            'course_id' => 'required',
            'session_id' => 'required',
            'question_file' => 'required|mimes:pdf|max:2048'
        ]);

        $course = Course::findOrFail($request->course_id);
        $session = Session::findOrFail($request->session_id);

        // This is to get the uploaded file

        $destination_name = str_replace(' ', '', $course->course_code);
        $file_name = str_replace(' ', '', $course->course_code) . '_' . str_replace('/', '', $session->session_name) . '.' . $request->question_file->getClientOriginalExtension();
        if ($request->file('question_file')) {
            $path = $request->file('question_file')->storeAs($destination_name, $file_name);

            Question::create([
                'course_id' => $formInput['course_id'],
                'session_id' => $formInput['session_id'],
                'path' => $path
            ]);
        }

        return redirect()->route('admin.questions.index')->with('success', 'Question created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return view('admin.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        $courses = Course::all();
        $sessions = Session::all();
        return view('admin.questions.edit', compact('courses', 'sessions', 'question'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Question $question)
    public function update(Request $request, $id)
    {
        $formInput = $request->validate([
            'course_id' => 'required',
            'session_id' => 'required',
            'question_file' => 'nullable|file|max:2048'
        ]);

        $course = Course::findOrFail($formInput['course_id']);
        $session = Session::findOrFail($formInput['session_id']);



        if ($request->hasFile('question_file')) {
            $question = Question::findOrFail($id);
            $question->course_id = $formInput['course_id'];
            $question->session_id = $formInput['session_id'];
            // Storage::delete($question->path);
            Storage::delete($question->path);
            $destination_name = str_replace(' ', '', $course->course_code);
            $file_name = str_replace(' ', '', $course->course_code) . '_' . str_replace('/', '', $session->session_name) . '.' . $request->question_file->getClientOriginalExtension();
            $path = $request->file('question_file')->storeAs($destination_name, $file_name);
            $question->path = $path;
            $question->save();
        }


        return redirect()->route('admin.questions.index')->with('success', 'Question updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        Storage::delete($question->path);
        $question->delete();
        return redirect()->route('admin.questions.index')->with('success', 'Questions deleted successfully');
    }
}
