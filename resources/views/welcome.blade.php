<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orange E card - NFC Digital Business Cards</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-brand-black">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="py-6 px-4">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <h1 class="text-brand-orange text-3xl font-bold">Orange E card</h1>

                @auth
                    <a href="{{ route('dashboard') }}"
                        class="bg-brand-orange text-white px-6 py-2 rounded-lg hover:bg-opacity-90 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-brand-orange text-white px-6 py-2 rounded-lg hover:bg-opacity-90 transition">
                        Login
                    </a>
                @endauth
            </div>
        </header>

        <!-- Hero Section -->
        <main class="flex-1 flex items-center justify-center px-4 py-12">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                    Your Digital Business Card,
                    <span class="text-brand-orange block mt-2">One Tap Away</span>
                </h2>

                <p class="text-brand-light text-lg md:text-xl lg:text-2xl mb-12 max-w-2xl mx-auto">
                    Modern NFC-powered digital business cards that make networking effortless.
                    Share your contact information instantly with just a tap.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @guest
                        <a href="{{ route('login') }}"
                            class="bg-brand-orange text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-opacity-90 transition shadow-lg">
                            Get Started
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}"
                            class="bg-brand-orange text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-opacity-90 transition shadow-lg">
                            Go to Dashboard
                        </a>
                    @endguest
                </div>
            </div>
        </main>

        <!-- Features Section -->
        <section class="py-16 px-4">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="text-center p-6">
                        <div
                            class="bg-brand-orange w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                            </svg>
                        </div>
                        <h3 class="text-white text-xl font-semibold mb-2">Instant Sharing</h3>
                        <p class="text-brand-light">Share your contact info with a simple NFC tap</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="text-center p-6">
                        <div
                            class="bg-brand-orange w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-white text-xl font-semibold mb-2">Easy Management</h3>
                        <p class="text-brand-light">Update your information anytime, anywhere</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="text-center p-6">
                        <div
                            class="bg-brand-orange w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-white text-xl font-semibold mb-2">Secure & Professional</h3>
                        <p class="text-brand-light">Enterprise-grade security for your data</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-6 border-t border-brand-gray">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <p class="text-brand-light text-sm">
                    &copy; {{ date('Y') }} Orange E card. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>

</html>