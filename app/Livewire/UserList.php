<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserList extends Component
{
    use WithPagination;

    public $search = '';
    public $confirmingDelete = false;
    public $userToDelete = null;

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($userId)
    {
        $this->confirmingDelete = true;
        $this->userToDelete = $userId;
    }

    public function deleteUser()
    {
        if ($this->userToDelete) {
            $user = User::find($this->userToDelete);
            if ($user && $user->isStandard()) {
                $user->is_active = false;
                $user->save();

                session()->flash('message', 'User deactivated successfully!');
            }
        }

        $this->confirmingDelete = false;
        $this->userToDelete = null;
    }

    public function resetPassword($userId)
    {
        $user = User::find($userId);

        if ($user && $user->isStandard()) {
            $tempPassword = Str::random(12);
            $user->password = Hash::make($tempPassword);
            $user->force_pw_reset = true;
            $user->save();

            // Send email with new password
            // Mail::to($user->email)->send(new PasswordResetMail($tempPassword));

            session()->flash('message', "Password reset for {$user->name}. Temp password: {$tempPassword}");
        }
    }

    public function render()
    {
        $users = User::standardUsers()
            ->active()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('username', 'like', '%' . $this->search . '%');
                });
            })
            ->with('digitalCard')
            ->latest()
            ->paginate(15);

        return view('livewire.user-list', [
            'users' => $users
        ])->layout('layouts.app');
    }
}
