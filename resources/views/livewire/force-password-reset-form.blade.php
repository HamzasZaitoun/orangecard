<div>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Old Password -->
        <div>
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" class="block mt-1 w-full" type="password" name="current_password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
        </div>

        <!-- New Password -->
        <div class="mt-4">
            <x-input-label for="new_password" :value="__('New Password')" />
            <x-text-input id="new_password" class="block mt-1 w-full" type="password" name="new_password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('new_password')" class="mt-2" />
        </div>

        <!-- Confirm New Password -->
        <div class="mt-4">
            <x-input-label for="new_password_confirmation" :value="__('Confirm New Password')" />
            <x-text-input id="new_password_confirmation" class="block mt-1 w-full" type="password" name="new_password_confirmation" required autocomplete="new-password_confirmation" />
            <x-input-error :messages="$errors->get('new_password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</div>
