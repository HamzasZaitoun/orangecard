<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserList extends Component
{
    use WithPagination;

    public $search = '';
    public $confirmingDelete = false;
    public $userToDelete = null;
    public $showPasswordModal = false;
    public $userToResetPassword = null;
    public $newPassword = '';
    public $confirmPassword = '';

    protected $queryString = ['search'];

    public function mount()
    {
        $this->showPasswordModal = false;
        $this->confirmingDelete = false;
    }

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

    public function openPasswordModal($userId)
    {
        // Only super admin can reset passwords
        if (!auth()->user()->isSuperAdmin()) {
            session()->flash('error', 'Only Super Admin can reset passwords.');
            return;
        }

        $this->userToResetPassword = $userId;
        $this->showPasswordModal = true;
        $this->newPassword = '';
        $this->confirmPassword = '';
    }

    public function closePasswordModal()
    {
        $this->showPasswordModal = false;
        $this->userToResetPassword = null;
        $this->newPassword = '';
        $this->confirmPassword = '';
        $this->resetValidation();
    }

    public function resetPassword()
    {
        $this->validate([
            'newPassword' => 'required|min:8',
            'confirmPassword' => 'required|same:newPassword',
        ], [
            'newPassword.required' => 'New password is required',
            'newPassword.min' => 'Password must be at least 8 characters',
            'confirmPassword.required' => 'Please confirm the password',
            'confirmPassword.same' => 'Passwords do not match',
        ]);

        $user = User::find($this->userToResetPassword);

        if ($user) {
            $user->password = Hash::make($this->newPassword);
            $user->save();

            session()->flash('message', "Password updated successfully for {$user->name}");
        }

        $this->closePasswordModal();
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
