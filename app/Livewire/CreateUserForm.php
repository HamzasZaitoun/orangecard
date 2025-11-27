<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class CreateUserForm extends Component
{
    public $name;
    public $username;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function submit()
    {
        $this->validate();

        // Create user
        $user = User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'user_role' => 'standard',
            'is_active' => true,
            'force_pw_reset' => false,
        ]);

        // Send welcome email with credentials
        // Mail::to($user->email)->send(new WelcomeMail($this->password));

        session()->flash('message', "User created successfully! Username: {$user->username}");

        return redirect()->route('admin.users');
    }

    public function render()
    {
        return view('livewire.create-user-form')
            ->layout('layouts.app');
    }
}
