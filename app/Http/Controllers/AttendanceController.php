<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Lesson;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function showAttendanceForm($lessonId)
    {
        // Get the lesson and its course's students
        $lesson = Lesson::with('course.users')->findOrFail($lessonId);
        $students = $lesson->course->users->where('role', 0);
        $attendances = Attendance::where('lesson_id', $lessonId)->get()->keyBy('user_id');

        return view('courses.lessons.attendance.form', compact('lesson', 'students', 'attendances'));
    }

    public function submitAttendance(Request $request, $lessonId)
    {
        // Validate the input
        $validatedData = $request->validate([
            'attendance.*.status' => 'required|in:0,1,2',
            'attendance.*.reason' => 'nullable|string',
        ]);

        // Process each attendance entry
        foreach ($request->attendance as $studentId => $attendanceData) {
            Attendance::updateOrCreate(
                [
                    'lesson_id' => $lessonId,
                    'user_id' => $studentId,
                ],
                [
                    'status' => $attendanceData['status'],
                    'reason' => $attendanceData['status'] == 2 ? $attendanceData['reason'] : null,
                ]
            );
        }

        // Redirect back with a success message
        return redirect()->route('courses.lessons.attendance.form', $lessonId)->with('success', __('template.Attendance has been submitted successfully'));
    }
}
