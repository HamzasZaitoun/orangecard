<div class="max-w-3xl mx-auto">
    <div
        class="relative mb-8 overflow-hidden rounded-2xl bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 bg-size-200 animate-gradient p-8 text-white shadow-2xl">
        <div class="relative z-10">
            <h2 class="text-3xl font-bold mb-2">Create New User</h2>
            <p class="text-slate-300">
                User account will be created automatically with generated credentials.
            </p>
        </div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full -ml-24 -mb-24"></div>
    </div>

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-200">
        <form wire:submit.prevent="submit" class="space-y-6">

            <div class="space-y-6">
                <div class="flex items-center space-x-3 pb-3 border-b-2 border-slate-100">
                    <div class="bg-blue-600 p-2 rounded-lg">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Account Information</h3>
                </div>

                <!-- Display generated username automatically -->
                <div class="group">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Generated Username
                    </label>
                    <div class="px-4 py-3 bg-slate-50 border-2 border-slate-200 rounded-xl text-slate-700 font-mono">
                        <strong>{{ $nextUsername ?? 'admin001' }}</strong>
                    </div>
                    <p class="text-sm text-slate-500 mt-1">Username is automatically generated</p>
                </div>

                <!-- Display generated name automatically -->
                <div class="group">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Generated Display Name
                    </label>
                    <div class="px-4 py-3 bg-slate-50 border-2 border-slate-200 rounded-xl text-slate-700">
                        <strong>{{ $nextName ?? 'Admin User 001' }}</strong>
                    </div>
                    <p class="text-sm text-slate-500 mt-1">Display name is automatically generated</p>
                </div>

                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg text-sm text-blue-800">
                    Default password: <strong>elite123</strong>. All credentials are generated automatically.
                </div>
            </div>

            <div class="flex space-x-4 pt-6">
                <button type="submit"
                    class="flex-1 bg-blue-600 text-white font-bold py-4 rounded-xl hover:bg-blue-700 hover:shadow-lg transition-all duration-200 flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Create User Account</span>
                </button>
                <a href="{{ route('admin.users') }}"
                    class="flex-1 bg-brand-gray text-white font-bold py-4 rounded-xl hover:bg-opacity-90 transition text-center flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Cancel</span>
                </a>
            </div>
        </form>
    </div>
</div>