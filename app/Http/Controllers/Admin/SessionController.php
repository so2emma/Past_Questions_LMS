<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = Session::all();
        return view('admin.sessions.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (((int)$request->session_end - (int)$request->session_start) != 1) {
            return redirect()->back()->with('failure', 'invalid session inputed');
        }

        $request->validate([
            'session_start' => 'required|unique:sessions,session_start',
            'session_end' => 'required|unique:sessions,session_end',
        ]);


        Session::create(
            [
                'session_start'=> $request->session_start,
                'session_end'=> $request->session_end,
                'session_name' => $request->session_start . '/' . $request->session_end
            ]
        );

        return redirect()->route('admin.sessions.index')->with('success', 'Session Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        // dd($id);
        $session->delete();
        return redirect()->route('admin.sessions.index')->with('success', 'Session deleted successfully');
    }
}
