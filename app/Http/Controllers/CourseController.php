<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'program_id' => 'required',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'program_id' => 'required',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index');
    }

    // public function showByUser($user_id)
    // {
    //     $courses = Course::where('user_id', $user_id)->get();
    //     return view('courses.showByUser', compact('courses'));
    // }

    // get the courses that the user is enrolled in
    public function showByUser($user_id)
    {
        $courses = Course::whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
        return view('courses.showByUser', compact('courses'));
    }
}
