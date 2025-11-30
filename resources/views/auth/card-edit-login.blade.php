<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Edit Card</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full space-y-8">
        <div>
            <div class="flex justify-center mb-4">
                <img src="{{ asset('orange.png') }}" alt="Orange Logo" class="w-24 h-24 object-contain">
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Login to Edit Your Card
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Please enter your credentials to edit your digital card
            </p>
        </div>

        <form class="mt-8 space-y-6" method="POST" action="{{ route('card.edit.login', $card->public_slug) }}">
            @csrf

            <div>
                <label for="username" class="sr-only">Username</label>
                <input id="username" name="username" type="text" required
                    class="relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-brand-orange focus:border-brand-orange"
                    placeholder="Username" value="{{ old('username', $card->user->username) }}">
                @error('username')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password" type="password" required
                    class="relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-brand-orange focus:border-brand-orange"
                    placeholder="Password">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-brand-orange hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-orange transition">
                    Login to Edit
                </button>
            </div>
        </form>
    </div>
</body>

</html>