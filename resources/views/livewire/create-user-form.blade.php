<div class="max-w-3xl mx-auto">
    <div class="relative mb-8 overflow-hidden rounded-2xl bg-gradient-to-r from-brand-orange via-red-500 to-brand-orange bg-size-200 animate-gradient p-8 text-white shadow-2xl">
        <div class="relative z-10">
            <h2 class="text-3xl font-bold mb-2">Create New User</h2>
            <p class="text-white/90">
                Admin will only set the username. Default password is <strong>orangecard123</strong>.
            </p>
        </div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full -ml-24 -mb-24"></div>
    </div>

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-brand-light">
        <form wire:submit="submit" class="space-y-6">

            <div class="space-y-6">
                <div class="flex items-center space-x-3 pb-3 border-b-2 border-brand-orange">
                    <div class="bg-brand-orange p-2 rounded-lg">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-black">Account Information</h3>
                </div>

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

                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-lg text-sm text-blue-700">
                    New user default password: <strong>orangecard123</strong>.
                </div>
            </div>

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
</div>