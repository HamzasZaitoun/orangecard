<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ $user->name }}</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-black text-white min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <div class="bg-zinc-900 rounded-3xl p-8 shadow-2xl">

            <!-- Logo/Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-orange-500 mb-2">OrangeCard</h1>
                <p class="text-gray-400">Login to edit {{ $user->name }}'s card</p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('card.template.login.post', $user->id) }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                        Email
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        required
                        autofocus
                        class="w-full px-4 py-3 bg-zinc-800 border border-zinc-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    @error('email')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                        Password
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="w-full px-4 py-3 bg-zinc-800 border border-zinc-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    @error('password')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-xl transition-colors duration-200">
                    Login
                </button>
            </form>

            <!-- Back Link -->
            <div class="mt-6 text-center">
                <a href="{{ route('card.template', [$user->username, $user->id]) }}"
                    class="text-sm text-gray-400 hover:text-orange-500 transition-colors">
                    ← Back to Card
                </a>
            </div>
        </div>
    </div>

</body>

</html>