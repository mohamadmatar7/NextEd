<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function show(Assignment $assignment)
    {
        return view('assignments.show', compact('assignment'));
    }
}