<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Course;
use App\Models\Program;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::with('media', 'user', 'likes', 'program', 'course')
            ->latest()
            ->paginate(9);
        
        return view('announcements.index', compact('announcements'));
    }

    public function showAnnouncementsByUserProgram()
    {
        $programIds = auth()->user()->courses->pluck('program_id');
        $announcementsPrograms = Announcement::whereIn('program_id', $programIds)->paginate(9);
    
        return view('announcements.showByUserProgram', compact('announcementsPrograms'));
    }
    

    public function show(Announcement $announcement)
    {
        $relatedAnnouncements = Announcement::where('id', '!=', $announcement->id)
            ->where('program_id', $announcement->program_id)
            ->latest()
            ->take(3)
            ->get();
        return view('announcements.show', compact('announcement', 'relatedAnnouncements'));
    }
    

    public function create()
    {
        $programs = Program::all();
        $courses = Course::all();
        return view('announcements.create', compact('programs', 'courses'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'body' => 'required',
    //         'image' => 'nullable|image|max:4096',
    //         'program_id' => 'nullable|exists:programs,id',
    //         'course_id' => 'nullable|exists:courses,id',
    //     ]);

    //     if ($request->hasFile('image')) {
    //         $announcement = Announcement::create([
    //             'title' => $request->title,
    //             'body' => $request->body,
    //             'program_id' => $request->program_id,
    //             'course_id' => $request->course_id,
    //             'user_id' => auth()->id(),
    //         ]);

    //         $announcement->addMediaFromRequest('image')->toMediaCollection('announcement-images');
    //         return redirect()->route('announcements.show', Announcement::latest()->first());
    //     }

    //     Announcement::create([
    //         'title' => $request->title,
    //         'body' => $request->body,
    //         'program_id' => $request->program_id,
    //         'course_id' => $request->course_id,
    //         'user_id' => auth()->id(),
    //     ]);

    //     return redirect()->route('announcements.show', Announcement::latest()->first());
    // }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'body' => 'required',
        'image' => 'nullable|image|max:4096',
        'program_id' => 'nullable|exists:programs,id',
        'course_id' => 'nullable|exists:courses,id',
    ]);

    // Create the announcement with or without an image
    $announcementData = [
        'title' => $request->title,
        'body' => $request->body,
        'program_id' => $request->program_id,
        'course_id' => $request->course_id,
        'user_id' => auth()->id(),
    ];

    $announcement = Announcement::create($announcementData);

    // Handle image upload if present, otherwise set a default image
    if ($request->hasFile('image')) {
        $announcement->addMediaFromRequest('image')->toMediaCollection('announcement-images');
    } else {
        // Add default image if none uploaded
        $defaultImagePath = public_path('assets/images/announcements/default.avif');
        $announcement->addMedia($defaultImagePath)->toMediaCollection('announcement-images');
    }

    return redirect()->route('announcements.show', $announcement);
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

}
