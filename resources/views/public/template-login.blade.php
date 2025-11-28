<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Edit Card</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full space-y-8 px-4">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Login to Edit Your Card
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Enter your credentials to complete your digital card setup
            </p>
        </div>

        @if(session('message'))
        <div class="rounded-md bg-green-50 p-4">
            <p class="text-sm font-medium text-green-800">{{ session('message') }}</p>
        </div>
        @endif

        <form class="mt-8 space-y-6" method="POST" action="{{ route('card.template.login.post', $user->id) }}">
            @csrf

            <div>
                <label for="username" class="sr-only">Username</label>
                <input id="username" name="username" type="text" required
                    class="relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                    placeholder="Username" value="{{ old('username', $user->username) }}">
                @error('username')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password" type="password" required
                    class="relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                    placeholder="Password">
                @error('password')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col space-y-3">
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition">
                    Login to Edit
                </button>

                <a href="{{ route('card.template', ['username' => $user->username, 'userId' => $user->id]) }}"
                    class="group relative w-full flex justify-center py-2 px-4 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition">
                    Back to Card
                </a>
            </div>
        </form>
    </div>
</body>

</html>