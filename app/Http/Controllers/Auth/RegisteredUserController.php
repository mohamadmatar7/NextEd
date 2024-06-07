<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:150'],
            'last_name' => ['required', 'string', 'max:155'],
            'name' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255',
            'regex:/^.*@nexted\.school$/',
            'unique:'.User::class],
            'father_name' => ['nullable', 'string', 'max:155'],
            'mother_name' => ['required', 'string', 'max:155'],
            'dob' => ['required', 'date'],
            'nationality' => ['required', 'string', 'max:50'], 
            'phone' => ['required', 'regex:/^(\+32|0)\d{9}$/'],
            'emergency_phone' => ['nullable', 'regex:/^(\+32|0)\d{9}$/'],
            'address' => ['required', 'string', 'max:255'],
            'role' => ['required', 'integer', 'min:0', 'max:4'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'gender' => ['required', 'string', 'max:50'],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->name,
            'email' => $request->email,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'dob' => $request->dob,
            'nationality' => $request->nationality,
            'phone' => $request->phone,
            'emergency_phone' => $request->emergency_phone,
            'address' => $request->address,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'gender' => $request->gender

        ]);

        // Store the avatar if provided
        if ($request->hasFile('avatar')) {
                $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }
        
        // Retrieve the avatar URL
        $avatarUrl = null;
        if ($user->hasMedia('avatars')) {
                $avatarUrl = $user->getFirstMediaUrl('avatars');
        }

        event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        $roleMap = config('roles');
        $role = $roleMap[$user->role];

        return redirect()->route('users.showByRole',  ['role' => $role]);
    }
}
