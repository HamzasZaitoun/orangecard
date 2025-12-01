<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CardEditorController extends Controller
{
    public function edit($username, $userId)
    {
        $user = auth()->user();

        // Verify the username and userId match the authenticated user
        if ($user->username !== $username || $user->id != $userId) {
            abort(403, 'Unauthorized access');
        }

        $card = $user->digitalCard;

        return view('livewire.card-editor', [
            'card' => $card,
            'current_image' => $card?->profile_img_url,
            'first_name' => $card?->first_name ?? '',
            'last_name' => $card?->last_name ?? '',
            'job_title' => $card?->job_title ?? '',
            'email' => $card?->email ?? $user->email,
            'mobile_number' => $card?->mobile_number ?? '',
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'mobile_number' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        $user = auth()->user();
        $card = $user->digitalCard ?? $user->digitalCard()->make();

        $card->fill([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'job_title' => $request->job_title,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'public_slug' => $user->username,
        ]);

        // Handle image upload
        if ($request->hasFile('profile_image')) {
            // Delete old image
            if ($card->profile_img_url) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $card->profile_img_url));
            }

            $path = $request->file('profile_image')->store('profiles', 'public');
            $card->profile_img_url = '/storage/' . $path;
        }

        $card->save();

        return redirect()->route('dashboard.edit', ['username' => $user->username, 'userId' => $user->id])->with('message', 'Card updated successfully!');
    }
}
