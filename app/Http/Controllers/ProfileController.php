<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        if ($request->hasFile('avatar')) {
            $request->user()->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


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

    // public function showByRole($role)
    // {
        
    //     $users = User::where('role', $role)->with(['courses', 'courses.program'])->get();
    //     return view('users.showByRole', compact('role', 'users'));
    // }

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


}
