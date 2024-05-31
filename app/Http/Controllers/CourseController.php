<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Assignment;
use App\Models\Program;
use App\Models\Announcement;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function show(Program $program, Course $course)
    {
        $program = $course->program;
        $items = [
            // [
            //     'route' => route('courses.assignments.showAssignments', [$program->id, $course->id]),
            //     'title' => __('template.Assignments'),
            //     'subtitle' => __('Manage and view all assignments'),
            //     'icon' => asset('assets/icons/group/assignments.svg'),
            // ],
            [
                // the course id is passed as a parameter with the user id with program id
                'route' => route('courses.assignments.showAssignmentsByUser', [ $program->id, $course->id, auth()->user()->id]),
                'title' => __('template.Assignments'),
                'subtitle' => __('Manage and view all assignments'),
                'icon' => asset('assets/icons/group/assignments.svg'),
            ],
            [
                'route' => route('courses.announcements.showAnnouncements', [$program->id, $course->id]),
                'title' => __('template.Announcements'),
                'subtitle' => __('Manage and view all announcements'),
                'icon' => asset('assets/icons/group/announcements.svg'),
            ],
            [
                'route' => route('courses.showStudents', [$program->id, $course->id]),
                'title' => __('template.Students'),
                'subtitle' => __('Manage and view all students'),
                'icon' => asset('assets/icons/group/users.svg'),
            ],
            [
                'route' => route('courses.showAdministrators', [$program->id, $course->id]),
                'title' => __('template.Administrators'),
                'subtitle' => __('Manage and view all administrators'),
                'icon' => asset('assets/icons/group/administrators.svg'),
            ],
            [
                'route' => route('courses.lessons.showLessons', [$program->id, $course->id]),
                'title' => __('template.Lessons'),
                'subtitle' => __('Manage and view all lessons'),
                'icon' => asset('assets/icons/group/lessons.svg'),
                
            ],
        ];
        return view('courses.show', compact('course', 'items', 'program'));
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

    public function showByProgram($program_id, $user_id)
    {
        $courses = Course::where('program_id', $program_id)->whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
        return view('courses.showByProgram', compact('courses'));
    }

    public function showLessons(Program $program, Course $course)
    {
        $lessons = $course->lessons;
        $program = $course->program;
        return view('courses.lessons.showLessons', compact('course', 'lessons', 'program'));
    }

    public function showUsers(Course $course)
    {
        $users = $course->users;
        return view('courses.showUsers', compact('course', 'users'));
    }

    public function showAdministrators(Program $program, Course $course)
    {
        $program = $course->program;
        $administrators = $course->users->where('role', 1 or 2 or 3 or 4);
        return view('courses.showAdministrators', compact('course', 'administrators', 'program'));
    }

    public function showStudents(Program $program, Course $course)
    {
        $program = $course->program;
        $students = $course->users->where('role', 0);
        return view('courses.showStudents', compact('course', 'students', 'program'));
    }

    public function showAnnouncements(Program $program, Course $course)
    {
        $announcements = $course->announcements()->latest()->paginate(10);
        $program = $course->program;
        return view('courses.announcements.showAnnouncements', compact('course', 'announcements', 'program'));
    }

    public function showAnnouncement(Program $program, Course $course, Announcement $announcement)
    {
        $program = $course->program;
        $relatedAnnouncements = $course->announcements()->where('id', '!=', $announcement->id)->latest()->take(3)->get();
        return view('courses.announcements.showAnnouncement', compact('course', 'announcement', 'program', 'relatedAnnouncements'));
    }
    
    public function showAssignments(Program $program, Course $course)
    {
        $assignments = $course->assignments;
        $program = $course->program;
        return view('courses.assignments.showAssignments', compact('course', 'assignments', 'program'));
    }

    public function showAssignmentsByUser(Program $program, Course $course, $user_id)
    {
        $assignments = Assignment::whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
        // Ensure $course is passed to the view
        return view('courses.assignments.showAssignmentsByUser', compact('assignments', 'program', 'course'));
    }
    
    public function showAssignmentByUser(Program $program, Course $course, Assignment $assignment, $user_id)
    {
        $course = $assignment->course;
        $program = $course->program;
        return view('courses.assignments.showAssignmentByUser', compact('course', 'assignment', 'program'));
    }

    public function showAssignment(Program $program, Course $course, Assignment $assignment)
    {
        $program = $course->program;
        return view('courses.assignments.showAssignment', compact('course', 'assignment', 'program'));
    }
}
