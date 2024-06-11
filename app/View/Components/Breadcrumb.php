<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class Breadcrumb extends Component
{
    public $segments;

    public function __construct()
    {
        $this->segments = $this->generateBreadcrumb();
    }

    private function generateBreadcrumb()
    {
        $segments = request()->segments();
        $breadcrumbs = [];
        $path = '';

        $isSpecialUrl = count($segments) >= 4 
            && $segments[0] == 'programs' 
            && is_numeric($segments[1]) 
            && $segments[2] == 'courses' 
            && $segments[3] == 'create';

        foreach ($segments as $index => $segment) {
            if ($segment == 'year') {
                // Skip adding 'year' to the breadcrumb but process the next segment as a year
                $path .= '/' . $segment;
                continue;
            }

            if ($isSpecialUrl && $segment == 'courses') {
                // Skip the 'courses' segment only for the special URL
                continue;
            }

            $path .= '/' . $segment;

            // Check if the segment is numeric and resolve its name
            if (is_numeric($segment)) {
                $segmentName = $this->resolveSegmentName($segment, $segments, $index);
            } else {
                $segmentName = ucfirst(str_replace('-', ' ', $segment));
            }

            // if ($segmentName === 'Courses') {
            //     $breadcrumbs[] = [
            //         'name' => $segmentName,
            //         'url' => route('courses.showByUser', auth()->id()),
            //     ];
            if ($segmentName === 'Courses') {
                if ($breadcrumbs && $breadcrumbs[count($breadcrumbs) - 2]['name'] === 'Programs') {
                    continue; // Skip adding 'Courses' after 'Programs'
                }
                $breadcrumbs[] = [
                    'name' => $segmentName,
                    'url' => route('courses.showByUser', auth()->id()),
                ];
            } elseif ($segmentName === 'Programs') {
                $breadcrumbs[] = [
                    'name' => $segmentName,
                    'url' => route('programs.showByUser', auth()->id()),
                ];
            } elseif ($segmentName === 'Assignments') {
                $breadcrumbs[] = [
                    'name' => $segmentName,
                    'url' => route('courses.assignments.showAssignmentsByUser', ['program' => $segments[$index - 1], 'course' => $segments[$index + 1], auth()->id()])
                ];
            } elseif ($segmentName !== 'User' && $segmentName !== 'Users') {
                $breadcrumbs[] = [
                    'name' => $segmentName['full'] ?? $segmentName, // Use the full name if available
                    'url' => url($path),
                ];
            }
        }

        return $breadcrumbs;
    }

    private function resolveSegmentName($segment, $segments, $index)
    {
        // Determine context based on the previous segment
        if (isset($segments[$index - 1])) {
            $previousSegment = $segments[$index - 1];

            if ($previousSegment === 'year' && is_numeric($segment)) {
                // Handle 'year' segment followed by a number as a year
                $yearNumber = intval($segment);
                $yearName = $this->getYearName($yearNumber);
                return $yearName;
            }

            switch ($previousSegment) {
                case 'categories':
                    return DB::table('categories')->where('id', $segment)->value('name') ?? 'Category ' . $segment;
                case 'programs':
                    return DB::table('programs')->where('id', $segment)->value('name') ?? 'Program ' . $segment;
                case 'announcements':
                    return DB::table('announcements')->where('id', $segment)->value('title') ?? 'Announcement ' . $segment;
                case 'courses':
                    $courseName = DB::table('courses')->where('id', $segment)->value('name') ?? 'Course ' . $segment;
                    // return strlen($courseName) > 15 ? $this->abbreviateName($courseName) : $courseName;
                    return $courseName;
                case 'semester':
                    $number = ['First Semester', 'Second Semester'];
                    return $number[$segment - 1] ?? 'Semester ' . $segment;
                case 'lessons':
                    $startDate = DB::table('lessons')->where('id', $segment)->value('start_time');
                    return $startDate ? date('Y-m-d', strtotime($startDate)) : 'Lesson ' . $segment;
                case 'assignments':
                    $assignmentName = DB::table('assignments')->where('id', $segment)->value('name') ?? 'Assignment ' . $segment;
                    return strlen($assignmentName) > 15 ? $this->abbreviateName($assignmentName) : $assignmentName;
                case 'user':
                    return 'User';
                case 'Student' || 'Teacher' || 'Instructor' || 'Principal' || 'Admin':
                    $username = DB::table('users')->where('id', $segment)->value('name') ?? 'User ' . $segment;
                    return $username;
                case 'year':
                    $number = ['First Year', 'Second Year', 'Third Year', 'Fourth Year', 'Fifth Year'];
                    return $number[$segment - 1] ?? 'Year ' . $segment;
                default:
                    return $segment; // Return the segment as it is
            }
        }

        return $segment; // Return the segment as it is
    }

    private function abbreviateName($name)
    {
        $words = explode(' ', $name);
        $abbreviatedName = '';
        foreach ($words as $word) {
            $abbreviatedName .= strtoupper(substr($word, 0, 1));
        }
        return $abbreviatedName;
    }
    
    private function getYearName($yearNumber)
    {
        $yearNames = [
            'First Year',
            'Second Year',
            'Third Year',
            'Fourth Year',
            'Fifth Year',
        ];

        return $yearNames[$yearNumber - 1] ?? 'Year ' . $yearNumber;
    }

    public function render(): View|Closure|string
    {
        return view('components.breadcrumb');
    }
}
