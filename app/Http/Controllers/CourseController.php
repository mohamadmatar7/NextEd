<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Assignment;
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
        // return view('courses.show', compact('course'));
        $items = [
            [
                'route' => route('courses.showAssignments', $course->id),
                'title' => __('template.Assignments'),
                'subtitle' => __('Manage and view all assignments'),
                'icon' => asset('assets/icons/group/assignments.svg'),
            ],
            [
                'route' => route('courses.showAnnouncements', $course->id),
                'title' => __('template.Announcements'),
                'subtitle' => __('Manage and view all announcements'),
                'icon' => asset('assets/icons/group/announcements.svg'),
            ],
            [
                'route' => route('courses.showUsers', $course->id),
                'title' => __('template.Students'),
                'subtitle' => __('Manage and view all students'),
                'icon' => asset('assets/icons/group/users.svg'),
            ],
            [
                'route' => route('courses.showAdministrators', $course->id),
                'title' => __('template.Administrators'),
                'subtitle' => __('Manage and view all administrators'),
                'icon' => asset('assets/icons/group/administrators.svg'),
            ],
            [
                'route' => route('courses.showLessons', $course->id),
                'title' => __('template.Lessons'),
                'subtitle' => __('Manage and view all lessons'),
                'icon' => asset('assets/icons/group/lessons.svg'),
                
            ],
        ];
        return view('courses.show', compact('course', 'items'));
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


    public function showByUser($user_id)
    {
        $courses = Course::whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
        return view('courses.showByUser', compact('courses'));
    }

    // show courses by program (user is enrolled in the course)
    public function showByProgram($program_id, $user_id)
    {
        $courses = Course::where('program_id', $program_id)->whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
        return view('courses.showByProgram', compact('courses'));
    }

    public function showLessons(Course $course)
    {
        $lessons = $course->lessons;
        return view('courses.showLessons', compact('course', 'lessons'));
    }

    public function showUsers(Course $course)
    {
        $users = $course->users;
        return view('courses.showUsers', compact('course', 'users'));
    }

    public function showAdministrators(Course $course)
    {
        $administrators = $course->users->where('role', 1 or 2 or 3 or 4);
        return view('courses.showAdministrators', compact('course', 'administrators'));
    }
    
    public function showAssignments(Course $course)
    {
        $assignments = $course->assignments;
        return view('courses.showAssignments', compact('course', 'assignments'));
    }

    public function showAssignment(Course $course, Assignment $assignment)
    {
        return view('courses.showAssignment', compact('course', 'assignment'));
    }
}
