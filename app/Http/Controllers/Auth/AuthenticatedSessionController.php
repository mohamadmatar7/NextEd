<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // protected function authenticated(Request $request, $user)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $user_role = Auth::user()->role;

    //         switch ($user_role) {
    //             case 0:
    //                 return redirect()->route('student.dashboard');
    //                 break;
    //             case 1:
    //                 return redirect()->route('teacher.dashboard');
    //                 break;
    //             case 2:
    //                 return redirect()->route('instructor.dashboard');
    //                 break;
    //             case 3:
    //                 return redirect()->route('principal.dashboard');
    //                 break;
    //             case 4:
    //                 return redirect()->route('admin.dashboard');
    //                 break;
    //             default:
    //                 Auth::logout();
    //                 return redirect()->route('login')->with('error', 'Invalid role');
    //         }

    //     } else {
    //         return redirect()->route('login');
    //     }
    // }


}


