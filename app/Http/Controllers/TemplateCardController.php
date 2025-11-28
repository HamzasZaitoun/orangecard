<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TemplateCardController extends Controller
{
    public function show($username, $userId)
    {
        $user = User::findOrFail($userId);

        if (!$user->is_active) {
            abort(404, 'This user is no longer available.');
        }

        // If user already has a card, redirect to it
        if ($user->digitalCard) {
            return redirect()->route('card.public', $user->digitalCard->public_slug);
        }

        return view('public.template-card', compact('user'));
    }


    public function showLoginForm($userId)
    {
        $user = User::findOrFail($userId);

        if (!$user->is_active) {
            abort(404, 'This user is no longer available.');
        }

        return view('public.template-login', compact('user'));
    }

    public function login(Request $request, $userId)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::findOrFail($userId);

        // Attempt authentication
        if (auth()->attempt([
            'username' => $request->username,
            'password' => $request->password,
            'is_active' => true
        ])) {
            // Check if logged-in user matches the template user
            if (auth()->id() === (int)$userId) {
                $request->session()->regenerate();
                return redirect()->route('dashboard.edit');
            } else {
                auth()->logout();
                return back()->withErrors([
                    'username' => 'Invalid credentials for this card.',
                ]);
            }
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}
