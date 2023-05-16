<?php

namespace App\Http\Middleware;

use App\Models\Course;
use App\Models\Sess;
use App\Models\Session;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCourseAndSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $course = Course::count();
        $session = Session::count();

        if ($course == 0) {
            return redirect()->route('admin.courses.create')->with('message', 'You need to create a Course before you can create a Question');
        }
        if ($session == 0) {
            return redirect()->route('admin.sessions.create')->with('message', 'You need to create a session before you can create a Question');
        }


        return $next($request);
    }
}
