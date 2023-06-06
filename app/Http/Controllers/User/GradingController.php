<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Grading;
use App\Models\User;
use Illuminate\Http\Request;

class GradingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $gradings = $user->gradings;
        return view('user.gradings.index', compact('gradings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Grading $grading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grading $grading)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grading $grading)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grading $grading)
    {
        //
    }
}
