<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateCardController extends Controller
{
    /**
     * Display the template card for users without a digital card
     */
    public function show($username, $userId)
    {
        $user = User::findOrFail($userId);

        // Verify username matches for security
        if ($user->username !== $username) {
            abort(404);
        }

        return view('public.template-card', compact('user'));
    }

    /**
     * Show login form for template card editing
     */
    public function showLoginForm($userId)
    {
        $user = User::findOrFail($userId);
        return view('auth.template-login', compact('user'));
    }

    /**
     * Handle login attempt for template card editing
     */
    public function login(Request $request, $userId)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::findOrFail($userId);

        // Verify the email matches the user
        if ($user->email !== $request->email) {
            return back()->withErrors([
                'email' => 'These credentials do not match our records.',
            ])->withInput();
        }

        // Attempt to log in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            // Redirect to dashboard edit page
            return redirect()->route('dashboard.edit', ['username' => Auth::user()->username]);
        }

        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->withInput();
    }
}
