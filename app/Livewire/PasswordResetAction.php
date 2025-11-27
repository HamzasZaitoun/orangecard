<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ForcePasswordResetForm extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    protected function rules()
    {
        return [
            'current_password' => 'required',
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }

    public function resetPassword()
    {
        $this->validate();

        $user = auth()->user();

        // Verify current password
        if (!Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'The current password is incorrect.');
            return;
        }

        // Update password
        $user->password = Hash::make($this->password);
        $user->force_pw_reset = false;
        $user->save();

        session()->flash('message', 'Password updated successfully!');

        // Redirect based on role
        if ($user->isSuperAdmin()) {
            return redirect()->route('superadmin.admins');
        } elseif ($user->isAdmin()) {
            return redirect()->route('admin.users');
        } else {
            return redirect()->route('dashboard.edit');
        }
    }

    public function render()
    {
        return view('livewire.force-password-reset-form')
            ->layout('layouts.guest');
    }
}
