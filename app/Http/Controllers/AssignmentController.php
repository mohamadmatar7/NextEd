<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::all();
        return view('assignments.index', compact('assignments'));
    }

    public function show(Assignment $assignment)
    {
        return view('assignments.show', compact('assignment'));
    }

    public function create()
    {
        return view('assignments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|max:4096',
            'description' => 'required',
            'due_date' => 'required',
            'course_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $assignment = Assignment::create([
                'title' => $request->title,
                'description' => $request->description,
                'due_date' => $request->due_date,
                'course_id' => $request->course_id,
                'user_id' => auth()->id(),
            ]);

            $assignment->addMediaFromRequest('image')->toMediaCollection('assignment-images');
            return redirect()->route('assignments.index');
        }

        Assignment::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'course_id' => $request->course_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('assignments.index');
    }

    public function edit(Assignment $assignment)
    {
        return view('assignments.edit', compact('assignment'));
    }

    public function update(Request $request, Assignment $assignment)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|max:4096',
            'description' => 'required',
            'due_date' => 'required',
            'course_id' => 'required',
        ]);

        $assignment = Assignment::findOrFail($assignment->id);

        if ($request->hasFile('image')) {
            $assignment->update([
                'title' => $request->title,
                'description' => $request->description,
                'due_date' => $request->due_date,
                'course_id' => $request->course_id,
            ]);

            $assignment->addMediaFromRequest('image')->toMediaCollection('assignment-images');
            return redirect()->route('assignments.index');
        }

        $assignment->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('assignments.index');
    }

    public function destroy(Assignment $assignment)
    {
        $assignment->delete();

        return redirect()->route('assignments.index');
    }
}