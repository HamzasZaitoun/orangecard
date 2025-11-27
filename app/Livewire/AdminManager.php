<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class AdminManager extends Component
{
    public $search = '';
    public $selectedUser = null;

    public function promoteToAdmin($userId)
    {
        $user = User::find($userId);

        if ($user && $user->isStandard()) {
            $user->user_role = 'admin';
            $user->save();

            session()->flash('message', "{$user->name} promoted to Admin!");
        }
    }

    public function demoteToStandard($userId)
    {
        $user = User::find($userId);

        if ($user && $user->user_role === 'admin') {
            $user->user_role = 'standard';
            $user->save();

            session()->flash('message', "{$user->name} demoted to Standard User!");
        }
    }

    public function render()
    {
        $standardUsers = User::standardUsers()
            ->active()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->get();

        $admins = User::admins()
            ->active()
            ->get();

        return view('livewire.admin-manager', [
            'standardUsers' => $standardUsers,
            'admins' => $admins,
        ])->layout('layouts.app');
    }
}
