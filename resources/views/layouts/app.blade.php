<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'OrangeCard') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-brand-light min-h-screen">
    <!-- Navigation -->
    <nav class="bg-brand-black border-b border-brand-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-brand-orange text-2xl font-bold">OrangeCard</span>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="text-white text-sm">{{ auth()->user()->name }}</span>

                    @if(auth()->user()->isSuperAdmin())
                        <a href="{{ route('superadmin.admins') }}"
                            class="text-brand-orange hover:text-white transition">Manage Admins</a>
                    @endif

                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.users') }}" class="text-brand-orange hover:text-white transition">Users</a>
                        <a href="{{ route('admin.users.create') }}"
                            class="text-brand-orange hover:text-white transition">Add User</a>
                    @endif

                    @if(auth()->user()->isStandard())
                        <a href="{{ route('dashboard.edit', ['username' => auth()->user()->username]) }}"
                            class="text-brand-orange hover:text-white transition">My Card</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="bg-brand-gray text-white px-4 py-2 rounded hover:bg-brand-orange transition">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('message') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('warning'))
                <div class="mb-4 p-4 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded">
                    {{ session('warning') }}
                </div>
            @endif

            {{ $slot }}
        </div>
    </main>

    @livewireScripts
</body>

</html>