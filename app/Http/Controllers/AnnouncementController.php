<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();
        return view('announcements.index', compact('announcements'));
    }

    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    public function create()
    {
        return view('announcements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|max:4096',
            'program_id' => 'nullable|exists:programs,id',
            'course_id' => 'nullable|exists:courses,id',
        ]);

        if ($request->hasFile('image')) {
            $announcement = Announcement::create([
                'title' => $request->title,
                'body' => $request->body,
                'program_id' => $request->program_id,
                'course_id' => $request->course_id,
                'user_id' => auth()->id(),
            ]);

            $announcement->addMediaFromRequest('image')->toMediaCollection('announcement-images');
            return redirect()->route('announcements.index');
        }

        Announcement::create([
            'title' => $request->title,
            'body' => $request->body,
            'program_id' => $request->program_id,
            'course_id' => $request->course_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('announcements.index');
    }


    public function edit(Announcement $announcement)
    {
        return view('announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|max:4096',
            'program_id' => 'nullable|exists:programs,id',
            'course_id' => 'nullable|exists:courses,id',
        ]);

        $announcement = Announcement::findOrFail($announcement->id);

        if ($request->hasFile('image')) {
            $announcement->update([
                'title' => $request->title,
                'body' => $request->body,
                'program_id' => $request->program_id,
                'course_id' => $request->course_id,
            ]);

            $announcement->clearMediaCollection('announcement-images');
            $announcement->addMediaFromRequest('image')->toMediaCollection('announcement-images');
            return redirect()->route('announcements.index');
        }

        $announcement->update([
            'title' => $request->title,
            'body' => $request->body,
            'program_id' => $request->program_id,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('announcements.index');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('announcements.index');
    }


    // show announcemnts of courses and get the program also in the param
    

    
}
