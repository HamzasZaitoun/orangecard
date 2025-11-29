<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserList extends Component
{
    use WithPagination;

    public $search = '';
    public $showPasswordModal = false;
    public $confirmingDelete = false;
    public $selectedUser;
    public $newPassword = '';
    public $confirmPassword = '';

    public function render()
    {
        $users = User::where('user_role', 'standard')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('username', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.user-list', compact('users'));
    }

    public function createCard($userId)
    {
        $user = User::findOrFail($userId);

        // Create digital card with default values if it doesn't exist
        if (!$user->digitalCard) {
            $digitalCard = $user->digitalCard()->create([
                'first_name' => $user->name,
                'last_name' => '',
                'job_title' => 'Professional',
                'email' => $user->email,
                'mobile_number' => '',
                'public_slug' => $user->username,
            ]);

            // Use the created digital card directly
            return redirect()->route('card.public', $digitalCard->public_slug);
        }

        // If card already exists, redirect to it
        return redirect()->route('card.public', $user->digitalCard->public_slug);
    }

    public function openPasswordModal($userId)
    {
        $this->selectedUser = User::findOrFail($userId);
        $this->showPasswordModal = true;
        $this->newPassword = '';
        $this->confirmPassword = '';
    }

    public function closePasswordModal()
    {
        $this->showPasswordModal = false;
        $this->selectedUser = null;
        $this->reset(['newPassword', 'confirmPassword']);
    }

    public function resetPassword()
    {
        $this->validate([
            'newPassword' => 'required|min:8',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        $this->selectedUser->update([
            'password' => Hash::make($this->newPassword),
        ]);

        session()->flash('message', 'Password reset successfully!');
        $this->closePasswordModal();
    }

    public function confirmDelete($userId)
    {
        $this->selectedUser = User::findOrFail($userId);
        $this->confirmingDelete = true;
    }

    public function deleteUser()
    {
        $this->selectedUser->delete();
        session()->flash('message', 'User deactivated successfully!');
        $this->confirmingDelete = false;
        $this->selectedUser = null;
    }
}
