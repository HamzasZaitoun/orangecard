<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserForm extends Component
{
    public $nextUsername;
    public $nextName;

    public function mount()
    {
        $this->generateNextCredentials();
    }

    public function submit()
    {
        $defaultPassword = 'elite123';
        $defaultEmail = $this->nextUsername . '@example.com';

        $user = User::create([
            'username' => $this->nextUsername,
            'name' => $this->nextName,
            'email' => $defaultEmail,
            'password' => Hash::make($defaultPassword),
            'user_role' => 'standard',
            'is_active' => true,
        ]);

        session()->flash('message', "User created with username: {$user->username}");

        return redirect()->route('admin.users');
    }

    private function generateNextCredentials()
    {
        $lastUser = User::where('username', 'like', 'admin%')
            ->orderBy('id', 'desc')
            ->first();

        if ($lastUser) {
            // Extract the number from username
            preg_match('/(\d+)$/', $lastUser->username, $matches);
            $nextNumber = intval($matches[1]) + 1;
        } else {
            $nextNumber = 1;
        }

        $paddedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        $this->nextUsername = 'admin' . $paddedNumber;
        $this->nextName = 'Admin User ' . $paddedNumber;
    }

    public function render()
    {
        return view('livewire.create-user-form')->layout('layouts.app');
    }
}
