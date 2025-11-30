<div class="min-h-screen bg-brand-black flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-brand-orange mb-2">Orange E Card</h1>
            <p class="text-white">Password Reset Required</p>
        </div>

        <div class="bg-white rounded-lg shadow-2xl p-8">
            <div class="mb-6">
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded">
                    <p class="font-semibold">Action Required</p>
                    <p class="text-sm">You must reset your password before continuing.</p>
                </div>
            </div>

            <form wire:submit="resetPassword" class="space-y-6">
                <!-- Current Password -->
                <div>
                    <label class="block text-sm font-medium text-brand-black mb-2">
                        Current Password *
                    </label>
                    <input type="password" wire:model="current_password"
                        class="w-full px-4 py-2 border border-brand-gray rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-orange">
                    @error('current_password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- New Password -->
                <div>
                    <label class="block text-sm font-medium text-brand-black mb-2">
                        New Password *
                    </label>
                    <input type="password" wire:model="password"
                        class="w-full px-4 py-2 border border-brand-gray rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-orange">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <p class="text-xs text-brand-gray mt-1">
                        Minimum 8 characters
                    </p>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-medium text-brand-black mb-2">
                        Confirm New Password *
                    </label>
                    <input type="password" wire:model="password_confirmation"
                        class="w-full px-4 py-2 border border-brand-gray rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-orange">
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-brand-orange text-white font-bold py-3 rounded-lg hover:bg-opacity-90 transition">
                    Reset Password
                </button>
            </form>

            <!-- Logout Option -->
            <div class="mt-6 text-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-brand-gray hover:text-brand-orange text-sm transition">
                        Logout Instead
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>