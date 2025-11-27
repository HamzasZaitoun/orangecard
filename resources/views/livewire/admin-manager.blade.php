<div>
    <h2 class="text-2xl font-bold text-brand-black mb-6">Admin Management</h2>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Current Admins -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-brand-black mb-4 flex items-center">
                <svg class="w-6 h-6 text-brand-orange mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                </svg>
                Current Admins
            </h3>

            <div class="space-y-3">
                @forelse($admins as $admin)
                <div class="flex items-center justify-between p-4 bg-brand-light rounded-lg">
                    <div>
                        <p class="font-semibold text-brand-black">{{ $admin->name }}</p>
                        <p class="text-sm text-brand-gray">{{ $admin->email }}</p>
                    </div>

                    @if(!$admin->isSuperAdmin())
                    <button wire:click="demoteToStandard({{ $admin->id }})"
                        class="bg-red-500 text-white px-4 py-2 rounded text-sm hover:bg-red-600 transition">
                        Demote
                    </button>
                    @else
                    <span class="bg-brand-orange text-white px-4 py-2 rounded text-sm">
                        Super Admin
                    </span>
                    @endif
                </div>
                @empty
                <p class="text-brand-gray text-center py-4">No admins found.</p>
                @endforelse
            </div>
        </div>

        <!-- Promote Standard Users -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-brand-black mb-4 flex items-center">
                <svg class="w-6 h-6 text-brand-orange mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" />
                </svg>
                Standard Users
            </h3>

            <input type="text"
                wire:model.live="search"
                placeholder="Search users..."
                class="w-full px-4 py-2 mb-4 border border-brand-gray rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-orange">

            <div class="space-y-3 max-h-96 overflow-y-auto">
                @forelse($standardUsers as $user)
                <div class="flex items-center justify-between p-4 bg-brand-light rounded-lg">
                    <div>
                        <p class="font-semibold text-brand-black">{{ $user->name }}</p>
                        <p class="text-sm text-brand-gray">{{ $user->email }}</p>
                    </div>

                    <button wire:click="promoteToAdmin({{ $user->id }})"
                        class="bg-brand-orange text-white px-4 py-2 rounded text-sm hover:bg-opacity-90 transition">
                        Promote
                    </button>
                </div>
                @empty
                <p class="text-brand-gray text-center py-4">No standard users found.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>