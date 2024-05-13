<?php

namespace App\Http\Controllers;

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
        return view('programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Program::create($request->all());

        return redirect()->route('programs.index');
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
    
}
