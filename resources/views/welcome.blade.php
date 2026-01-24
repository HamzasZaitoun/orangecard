<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Plus - NFC Digital Business Cards</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white antialiased font-sans selection:bg-gray-500 selection:text-white">
    <div class="min-h-screen flex flex-col relative overflow-hidden">

        <!-- Background Effects -->
        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[500px] bg-gradient-to-b from-gray-900 via-black to-black opacity-50 pointer-events-none z-0">
        </div>
        <div
            class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-gray-900 via-black to-black -z-10">
        </div>

        <!-- Header -->
        <header class="py-6 px-6 relative z-10">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-2 group">
                    <img src="{{ asset('elite-plus-logo.png') }}" alt="Elite Plus"
                        class="h-12 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                </a>

                @auth
                    <a href="{{ route('dashboard') }}"
                        class="px-6 py-2.5 rounded-full border border-gray-700 bg-gray-900/50 backdrop-blur-sm text-gray-300 hover:text-white hover:border-gray-500 transition-all duration-300 text-sm font-medium tracking-wide">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-6 py-2.5 rounded-full border border-gray-700 bg-gray-900/50 backdrop-blur-sm text-gray-300 hover:text-white hover:border-gray-500 transition-all duration-300 text-sm font-medium tracking-wide">
                        Login
                    </a>
                @endauth
            </div>
        </header>

        <!-- Hero Section -->
        <main class="flex-1 flex items-center justify-center px-4 py-16 relative z-10">
            <div class="max-w-5xl mx-auto text-center">

                <!-- Badge -->
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gray-900/80 border border-gray-800 text-xs font-medium text-gray-400 mb-8 animate-fade-in-up">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                    The Future of Networking
                </div>

                <!-- Headline -->
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black tracking-tight mb-8 leading-tight">
                    <span class="block text-transparent bg-clip-text bg-gradient-to-b from-white to-gray-400">Your
                        Digital Identity,</span>
                    <span
                        class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-gray-200 via-white to-gray-400 drop-shadow-[0_0_15px_rgba(255,255,255,0.3)]">
                        Elevated.
                    </span>
                </h1>

                <!-- Subheadline -->
                <p
                    class="text-gray-400 text-lg md:text-xl lg:text-2xl mb-12 max-w-2xl mx-auto leading-relaxed font-light">
                    Share your professional profile instantly with <span class="text-white font-medium">NFC
                        technology</span>.
                    Premium metal cards for the modern professional.
                </p>

                <!-- CTA Actions -->
                <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
                    @guest
                        <a href="{{ route('login') }}"
                            class="group relative inline-flex items-center justify-center px-8 py-4 text-base font-bold text-black transition-all duration-200 bg-white font-pj rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 ring-offset-black hover:bg-gray-200 transform hover:-translate-y-1">
                            Get Started
                            <svg class="ml-2 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}"
                            class="group relative inline-flex items-center justify-center px-8 py-4 text-base font-bold text-black transition-all duration-200 bg-white font-pj rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 ring-offset-black hover:bg-gray-200 transform hover:-translate-y-1">
                            Go to Dashboard
                            <svg class="ml-2 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    @endguest

                    <a href="#features"
                        class="text-gray-400 hover:text-white text-sm font-medium transition-colors duration-300 flex items-center gap-2 px-4 py-2">
                        Learn more
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>
                </div>
            </div>
        </main>

        <!-- Features Grid -->
        <section id="features"
            class="py-24 px-4 relative z-10 border-t border-gray-900/50 bg-black/50 backdrop-blur-sm">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
                    <!-- Feature 1 -->
                    <div
                        class="group p-8 rounded-3xl bg-gray-900/30 border border-gray-800 hover:border-gray-600 transition-all duration-300 hover:bg-gray-900/60">
                        <div
                            class="w-14 h-14 rounded-2xl bg-gradient-to-br from-gray-800 to-black border border-gray-700 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Instant Sharing</h3>
                        <p class="text-gray-400 leading-relaxed text-sm">Transfer your entire digital identity with a
                            single tap. No app required for the receiver.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div
                        class="group p-8 rounded-3xl bg-gray-900/30 border border-gray-800 hover:border-gray-600 transition-all duration-300 hover:bg-gray-900/60">
                        <div
                            class="w-14 h-14 rounded-2xl bg-gradient-to-br from-gray-800 to-black border border-gray-700 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Real-time Updates</h3>
                        <p class="text-gray-400 leading-relaxed text-sm">Update your details instantly from our
                            dashboard. Your card stays current, always.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div
                        class="group p-8 rounded-3xl bg-gray-900/30 border border-gray-800 hover:border-gray-600 transition-all duration-300 hover:bg-gray-900/60">
                        <div
                            class="w-14 h-14 rounded-2xl bg-gradient-to-br from-gray-800 to-black border border-gray-700 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Bank-Grade Security</h3>
                        <p class="text-gray-400 leading-relaxed text-sm">Your data is encrypted and protected. You have
                            full control over what you share.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 border-t border-gray-900 bg-black relative z-10">
            <div class="max-w-7xl mx-auto px-4 flex flex-col items-center">
                <img src="{{ asset('elite-plus-logo.png') }}" alt="Elite Plus"
                    class="h-8 w-auto mb-6 opacity-50 grayscale hover:grayscale-0 transition-all duration-300">
                <p class="text-gray-600 text-sm font-medium">
                    &copy; {{ date('Y') }} Elite Plus. Redefining Connections.
                </p>
            </div>
        </footer>
    </div>
</body>

</html>