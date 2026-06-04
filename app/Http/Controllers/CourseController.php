<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display all available courses on the homepage.
     * Supports optional ?category= filter.
     */
    public function index(Request $request)
    {
        $query = Course::withCount('enrollments');

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $courses = $query->latest()->get();

        // Collect IDs of courses the logged-in user is already enrolled in
        $enrolledIds = collect();
        if (Auth::check()) {
            $enrolledIds = Auth::user()
                ->enrollments()
                ->pluck('course_id');
        }

        return view('courses.index', compact('courses', 'enrolledIds'));
    }
}
