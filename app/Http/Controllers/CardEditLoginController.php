<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DigitalCard;

class CardEditLoginController extends Controller
{
    public function showLoginForm($slug)
    {
        $card = DigitalCard::where('public_slug', $slug)->firstOrFail();
        return view('auth.card-edit-login', compact('card'));
    }

    public function login(Request $request, $slug)
    {
        $card = DigitalCard::where('public_slug', $slug)->firstOrFail();

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if this user owns the card
            if ($user->id === $card->user_id) {
                return redirect()->route('dashboard.edit', ['username' => $user->username]);
            }

            Auth::logout();
            return back()->withErrors([
                'username' => 'You do not have permission to edit this card.',
            ]);
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}
