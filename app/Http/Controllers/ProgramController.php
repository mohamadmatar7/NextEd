<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    public function show(Program $program)
    {
        return view('programs.show', compact('program'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('programs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'years' => 'required|integer',
            'category_id' => 'required|exists:categories,id',

        ]);

        Program::create($request->all());

        return redirect()->route('categories.show', $request->category_id);
    }

    public function edit(Program $program)
    {
        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $program->update($request->all());

        return redirect()->route('programs.index');
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('programs.index');
    }


    // show the program by user_id that get it from the courses that belong to the program
    public function showByUser($user_id)
    {
        // Fetch programs through the courses the user is enrolled in
        $programs = Program::whereHas('courses.users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->with('courses')->get();

        return view('programs.showByUser', compact('programs'));
    }

    // show based on the years of the program
    public function showYear(Program $program, $year)
    {
        $courses = $program->courses()->where('year', $year)->get();
        return view('programs.showYear', compact('program', 'year', 'courses'));
    }

}
