<div>
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-brand-black">Standard Users</h2>
        <a href="{{ route('admin.users.create') }}"
            class="bg-brand-orange text-white px-6 py-2 rounded-lg hover:bg-opacity-90 transition">
            Add New User
        </a>
    </div>

    <!-- Search -->
    <div class="mb-6">
        <input type="text"
            wire:model.live="search"
            placeholder="Search by name, email, or username..."
            class="w-full px-4 py-2 border border-brand-gray rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-orange">
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="w-full">
            <thead class="bg-brand-black text-white">
                <tr>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Username</th>
                    <th class="px-6 py-3 text-left">Card Link</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-brand-light">
                @forelse($users as $user)
                <tr class="hover:bg-brand-light transition">
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">{{ $user->username }}</td>
                    <td class="px-6 py-4">
                        @if($user->digitalCard)
                        <a href="{{ route('card.public', $user->digitalCard->public_slug) }}"
                            target="_blank"
                            class="text-brand-orange hover:underline">
                            View Card
                        </a>
                        @else
                        <span class="text-brand-gray text-sm">No card</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center space-x-2">
                            @if(auth()->user()->isSuperAdmin())
                            <button wire:click="openPasswordModal({{ $user->id }})"
                                class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600 transition">
                                Reset Password
                            </button>
                            @endif
                            <button wire:click="confirmDelete({{ $user->id }})"
                                class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600 transition">
                                Deactivate
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-brand-gray">
                        No users found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $users->links() }}
    </div>

    <!-- Password Reset Modal -->
    @if($showPasswordModal)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
            <h3 class="text-xl font-bold text-brand-black mb-4">Reset Password</h3>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-brand-black mb-2">New Password</label>
                    <input type="password"
                        wire:model="newPassword"
                        class="w-full px-4 py-2 border border-brand-gray rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-orange">
                    @error('newPassword')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-brand-black mb-2">Confirm Password</label>
                    <input type="password"
                        wire:model="confirmPassword"
                        class="w-full px-4 py-2 border border-brand-gray rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-orange">
                    @error('confirmPassword')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex space-x-4 mt-6">
                <button wire:click="resetPassword"
                    class="flex-1 bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                    Update Password
                </button>
                <button wire:click="closePasswordModal"
                    class="flex-1 bg-brand-gray text-white py-2 rounded-lg hover:bg-opacity-90 transition">
                    Cancel
                </button>
            </div>
        </div>
    </div>
    @endif

    <!-- Delete Confirmation Modal -->
    @if($confirmingDelete)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
            <h3 class="text-xl font-bold text-brand-black mb-4">Confirm Deactivation</h3>
            <p class="text-brand-gray mb-6">Are you sure you want to deactivate this user? They will no longer be able to log in.</p>
            <div class="flex space-x-4">
                <button wire:click="deleteUser"
                    class="flex-1 bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">
                    Deactivate
                </button>
                <button wire:click="$set('confirmingDelete', false)"
                    class="flex-1 bg-brand-gray text-white py-2 rounded-lg hover:bg-opacity-90 transition">
                    Cancel
                </button>
            </div>
        </div>
    </div>
    @endif
</div>