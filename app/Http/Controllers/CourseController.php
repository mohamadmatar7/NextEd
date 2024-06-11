<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\Program;
use App\Models\Announcement;
use App\Models\User;
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

    public function create(Program $program)
    {
        $program = $program;
        $programs = Program::all();
        return view('courses.create', compact('program', 'programs'));
    }

    public function store(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'program_id' => 'required',
            'year' => 'required',
            'study_year' => 'required',
            'semester' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/courses', 'public');
            $imageUrl = asset('assets/' . $imagePath);
        } else {
            $imageUrl = asset('assets/images/courses/course.svg');
        }
        $data = $request->all();
        $data['image'] = $imageUrl;

        $program->courses()->create($data);   
        return redirect()->route('programs.show', $program);
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


    public function showAdministrators(Request $request, Program $program, Course $course)
    {
        $search = $request->input('search');
        $program = $course->program;
        $administrators = $course->users->where('role', 1 or 2 or 3 or 4);
        $administratorsToAdd = $administrators->pluck('id')->toArray();

        // Handle AJAX search request
        if ($request->ajax()) {
            if ($search == '') {
                $users = User::where('role', 1 or 2 or 3 or 4)
                            ->whereNotIn('id', $administratorsToAdd)
                            ->limit(5)
                            ->get();
            } else {
                $users = User::where('role', 1 or 2 or 3 or 4)
                            ->whereNotIn('id', $administratorsToAdd)
                            ->where('name', 'like', '%' . $search . '%')
                            ->limit(5)
                            ->get();
            }

            $response = [];
            foreach ($users as $user) {
                $response[] = [
                    "id" => $user->id,
                    "text" => $user->name
                ];
            }

            return response()->json($response);
        }

        // Regular page load
        $administratorsToAdds = User::where('role', 1 or 2 or 3 or 4)
                        ->whereNotIn('id', $administratorsToAdd)
                        ->get();

        return view('courses.showAdministrators', compact('course', 'administrators', 'program', 'administratorsToAdds'));
    }


    public function showStudents(Request $request, Program $program, Course $course)
    {
        $search = $request->input('search');
        $program = $course->program;
        $students = $course->users->where('role', 0);
        $studentsToAdd = $students->pluck('id')->toArray();

        // Handle AJAX search request
        if ($request->ajax()) {
            if ($search == '') {
                $users = User::where('role', 0)
                            ->whereNotIn('id', $studentsToAdd)
                            ->limit(5)
                            ->get();
            } else {
                $users = User::where('role', 0)
                            ->whereNotIn('id', $studentsToAdd)
                            ->where('name', 'like', '%' . $search . '%')
                            ->limit(5)
                            ->get();
            }

            $response = [];
            foreach ($users as $user) {
                $response[] = [
                    "id" => $user->id,
                    "text" => $user->name
                ];
            }

            return response()->json($response);
        }

        // Regular page load
        $studentsToAdds = User::where('role', 0)
                        ->whereNotIn('id', $studentsToAdd)
                        ->get();

        return view('courses.showStudents', compact('course', 'students', 'program', 'studentsToAdds'));
    }


    public function showAnnouncements(Program $program, Course $course)
    {
        $announcements = $course->announcements()->latest()->paginate(9);
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

    public function destroyUserFromCourse(Course $course, $user_id)
    {
        $course->users()->detach($user_id);
        return redirect()->back();
    }



    public function storeStudentsToCourse(Request $request, Course $course)
    {
        // Validate that students is an array and contains integers
        $validated = $request->validate([
            'students' => 'required|array',
            'students.*' => 'integer|exists:users,id',
        ]);

        // Attach students to the course
        $course->users()->attach($validated['students'], ['status' => Status::enrolled, 'completed_at' => null]);

        // Redirect back with a success message
        return redirect()->back()->with('success', __('template.Students added to the course successfully.'));
    }

    public function storeAdministratorsToCourse(Request $request, Course $course)
    {
        // Validate that administrators is an array and contains integers
        $validated = $request->validate([
            'administrators' => 'required|array',
            'administrators.*' => 'integer|exists:users,id',
        ]);

        // Attach administrators to the course
        $course->users()->attach($validated['administrators'], ['status' => Status::enrolled, 'completed_at' => null]);

        // Redirect back with a success message
        return redirect()->back()->with('success', __('template.Administrators added to the course successfully.'));
    }



}
