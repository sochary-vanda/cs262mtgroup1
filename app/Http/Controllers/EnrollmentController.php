<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    /**
     * Dashboard — list all of the authenticated user's enrollments.
     */
    public function index()
    {
        $enrollments = Auth::user()
            ->enrollments()
            ->with('course')
            ->latest()
            ->get();

        return view('dashboard.index', compact('enrollments'));
    }

    /**
     * Enroll the authenticated user in a course.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => ['required', 'exists:courses,id'],
        ]);

        // Prevent duplicate enrollment
        $exists = Enrollment::where('user_id', Auth::id())
            ->where('course_id', $request->course_id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'You are already enrolled in this course.');
        }

        Enrollment::create([
            'user_id'   => Auth::id(),
            'course_id' => $request->course_id,
            'status'    => 'active',
        ]);

        $course = Course::find($request->course_id);

        return back()->with('success', "You have enrolled in \"{$course->title}\"!");
    }

    /**
     * Update the enrollment status and/or notes.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        // Ensure the enrollment belongs to the authenticated user
        abort_if($enrollment->user_id !== Auth::id(), 403);

        $data = $request->validate([
            'status' => ['required', 'in:active,completed,paused,dropped'],
            'notes'  => ['nullable', 'string', 'max:1000'],
        ]);

        $enrollment->update($data);

        return redirect()->route('dashboard')->with('success', 'Enrollment updated successfully.');
    }

    /**
     * Remove (unenroll) the user from a course.
     */
    public function destroy(Enrollment $enrollment)
    {
        abort_if($enrollment->user_id !== Auth::id(), 403);

        $title = $enrollment->course->title;
        $enrollment->delete();

        return redirect()->route('dashboard')->with('success', "You have been removed from \"{$title}\".");
    }
}
