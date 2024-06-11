<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showByUser($user_id)
    {
        $user = User::find($user_id);
        $programs = $user->programs;
        return view('programs.index', compact('programs'));
    }


    public function showByUserRoles()
    {
        // Get the user counts for each role
        $userCounts = User::select('role', User::raw('count(*) as user_count'))
        ->groupBy('role')
        ->pluck('user_count', 'role');

        // Get the roles from the configuration file
        $roleNames = config('roles');

        // Map the roles to their names and counts
        $roles = collect($roleNames)->map(function($name, $role) use ($userCounts) {
            return [
                'name' => $name,
                'user_count' => $userCounts->get($role, 0),
            ];
        });

        return view('users.showByRoles', compact('roles'));
    }


    public function showByRole($role)
    {
        // Get the role map from the config file
        $roleMap = config('roles');

        // Check if the role exists in the role map
        if (!in_array($role, $roleMap)) {
            abort(404, 'Role not found');
        }

        // Get the role ID from the role map
        $roleId = array_search($role, $roleMap);

        // Fetch users with the specified role along with their courses and programs
        $users = User::where('role', $roleId)->with(['courses', 'courses.program'])->get();

        return view('users.showByRole', compact('users', 'role'));
    }


    // public function showSpecificUser($role, $user_id)
    // {
    //     // Get the role map from the config file
    //     $roleMap = config('roles');

    //     // Check if the role exists in the role map
    //     if (!in_array($role, $roleMap)) {
    //         abort(404, 'Role not found');
    //     }

    //     // Get the role ID from the role map
    //     $roleId = array_search($role, $roleMap);

    //     // Fetch the user with the specified role and ID along with their courses and programs
    //     $user = User::where('role', $roleId)->with(['courses', 'courses.program'])->find($user_id);

    //     // Check if the user exists
    //     if (!$user) {
    //         abort(404, 'User not found');
    //     }

    //     return view('users.showSpecificUser', compact('user', 'role'));
        
    // }

    public function showSpecificUser($role, $user_id, Request $request)
    {
        // Get the role map from the config file
        $roleMap = config('roles');

        // Check if the role exists in the role map
        if (!in_array($role, $roleMap)) {
            abort(404, 'Role not found');
        }

        // Get the role ID from the role map
        $roleId = array_search($role, $roleMap);

        // Fetch the user with the specified role and ID along with their courses and programs
        $user = User::where('role', $roleId)->with(['courses', 'courses.program'])->find($user_id);

        // Check if the user exists
        if (!$user) {
            abort(404, 'User not found');
        }

        // Fetch all courses excluding the ones the user is already enrolled in
        $courses = Course::whereNotIn('id', $user->courses->pluck('id'))->get();

        // Apply search filter if search query is provided
        $search = $request->input('search');
        if ($request->ajax()) {
            if ($search == '') {
                $courses = Course::whereNotIn('id', $user->courses->pluck('id'))->limit(5)->get();
            } else {
                $courses = Course::whereNotIn('id', $user->courses->pluck('id'))->where('name', 'like', '%' . $search . '%')->limit(5)->get();
            }
            $response = [];
            foreach ($courses as $course) {
                $response[] = ['id' => $course->id, 'text' => $course->name];
            }
            return response()->json($response);
        }
        return view('users.showSpecificUser', compact('user', 'role', 'courses'));
    }

    public function storeCoursesToUser(Request $request, User $user)
    {
        // Validate that courses is an array and contains integers
        $validated = $request->validate([
            'courses' => 'required|array',
            'courses.*' => 'integer|exists:courses,id',
        ]);

        // Attach courses to the user
        $user->courses()->attach($validated['courses'], ['status' => Status::enrolled, 'completed_at' => null]);

        // Redirect back with a success message
        return redirect()->back()->with('success', __('template.Courses added to the user successfully.'));
    }


    public function destroySpecificUser($role, $user_id)
    {
        // Get the role map from the config file
        $roleMap = config('roles');

        // Check if the role exists in the role map
        if (!in_array($role, $roleMap)) {
            abort(404, 'Role not found');
        }

        // Get the role ID from the role map
        $roleId = array_search($role, $roleMap);

        // Fetch the user with the specified role and ID along with their courses and programs
        $user = User::where('role', $roleId)->with(['courses', 'courses.program'])->find($user_id);

        // Check if the user exists
        if (!$user) {
            abort(404, 'User not found');
        }

        $user->delete();

        return redirect()->route('users.showByRole', $role);
    }
}
