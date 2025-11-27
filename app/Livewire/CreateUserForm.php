<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserForm extends Component
{
    public $username;

    protected $rules = [
        'username' => 'required|string|max:255|unique:users,username',
    ];

   public function submit()
{
    $this->validate();

    $defaultPassword = 'orangecode123';
    $defaultEmail = $this->username . '@example.com';  // Default email

    $user = User::create([
        'username' => $this->username,
        'name' => $this->username,
        'email' => $defaultEmail,  // Set default email
        'password' => Hash::make($defaultPassword),
        'user_role' => 'standard',
        'is_active' => true,
        'force_pw_reset' => true,
    ]);

    session()->flash('message', "User created with username: {$user->username}");

    return redirect()->route('admin.users');
}

    public function render()
    {
        return view('livewire.create-user-form')->layout('layouts.app');
    }
}
