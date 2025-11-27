<div class="max-w-3xl mx-auto">
    <!-- Header with animated gradient -->
    <div class="relative mb-8 overflow-hidden rounded-2xl bg-gradient-to-r from-brand-orange via-red-500 to-brand-orange bg-size-200 animate-gradient p-8 text-white shadow-2xl">
        <div class="relative z-10">
            <h2 class="text-3xl font-bold mb-2">Create New User</h2>
            <p class="text-white/90">Set up a new account - user will add card details after login</p>
        </div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full -ml-24 -mb-24"></div>
    </div>

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-brand-light">
        <form wire:submit="submit" class="space-y-6">
            <!-- Account Information Section -->
            <div class="space-y-6">
                <div class="flex items-center space-x-3 pb-3 border-b-2 border-brand-orange">
                    <div class="bg-brand-orange p-2 rounded-lg">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-black">Account Information</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Full Name -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-brand-black mb-2 group-focus-within:text-brand-orange transition">
                            Full Name *
                        </label>
                        <div class="relative">
                            <input type="text"
                                wire:model="name"
                                placeholder="John Doe"
                                class="w-full px-4 py-3 pl-11 border-2 border-brand-light rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition bg-gray-50 focus:bg-white">
                            <div class="absolute left-3 top-3.5 text-brand-gray">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('name')
                        <p class="text-red-500 text-sm mt-1 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Username -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-brand-black mb-2 group-focus-within:text-brand-orange transition">
                            Username *
                        </label>
                        <div class="relative">
                            <input type="text"
                                wire:model="username"
                                placeholder="johndoe"
                                class="w-full px-4 py-3 pl-11 border-2 border-brand-light rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition bg-gray-50 focus:bg-white">
                            <div class="absolute left-3 top-3.5 text-brand-gray">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('username')
                        <p class="text-red-500 text-sm mt-1 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="group">
                    <label class="block text-sm font-semibold text-brand-black mb-2 group-focus-within:text-brand-orange transition">
                        Email Address *
                    </label>
                    <div class="relative">
                        <input type="email"
                            wire:model="email"
                            placeholder="john@company.com"
                            class="w-full px-4 py-3 pl-11 border-2 border-brand-light rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition bg-gray-50 focus:bg-white">
                        <div class="absolute left-3 top-3.5 text-brand-gray">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                    </div>
                    @error('email')
                    <p class="text-red-500 text-sm mt-1 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Password Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Password -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-brand-black mb-2 group-focus-within:text-brand-orange transition">
                            Password *
                        </label>
                        <div class="relative">
                            <input type="password"
                                wire:model="password"
                                placeholder="••••••••"
                                class="w-full px-4 py-3 pl-11 border-2 border-brand-light rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition bg-gray-50 focus:bg-white">
                            <div class="absolute left-3 top-3.5 text-brand-gray">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('password')
                        <p class="text-red-500 text-sm mt-1 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                        <p class="text-xs text-brand-gray mt-1.5 ml-1">Minimum 8 characters</p>
                    </div>

                    <!-- Confirm Password -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-brand-black mb-2 group-focus-within:text-brand-orange transition">
                            Confirm Password *
                        </label>
                        <div class="relative">
                            <input type="password"
                                wire:model="password_confirmation"
                                placeholder="••••••••"
                                class="w-full px-4 py-3 pl-11 border-2 border-brand-light rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition bg-gray-50 focus:bg-white">
                            <div class="absolute left-3 top-3.5 text-brand-gray">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-blue-700">
                                The user will add their digital card information (name, job title, photo, etc.) after their first login.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-4 pt-6">
                <button type="submit"
                    class="flex-1 bg-gradient-to-r from-brand-orange to-red-500 text-white font-bold py-4 rounded-xl hover:shadow-lg hover:scale-105 transition-all duration-200 flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    <span>Create User Account</span>
                </button>
                <a href="{{ route('admin.users') }}"
                    class="flex-1 bg-brand-gray text-white font-bold py-4 rounded-xl hover:bg-opacity-90 transition text-center flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                    <span>Cancel</span>
                </a>
            </div>
        </form>
    </div>

    <style>
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 3s ease infinite;
        }
    </style>
</div>