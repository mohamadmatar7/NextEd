<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function showByCourse($courseId)
    {
        $course = Course::find($courseId);
        $lessons = $course->lessons;
        return view('courses.lessons.showLessons', compact('lessons'));
    }


    public function show(Course $course, Lesson $lesson)
    {
        return view('courses.lessons.showLesson', compact('course', 'lesson'));
    }


}
