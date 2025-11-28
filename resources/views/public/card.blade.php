<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $card->full_name }} - Digital Card</title>
    @vite(['resources/css/app.css'])
    <style>
        body {
            background-color: #000000;
        }

        /* Mobile Phone Frame */
        .phone-frame {
            background: linear-gradient(145deg, #1a1a1a, #0a0a0a);
            border-radius: 3rem;
            padding: 1rem;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.8),
                inset 0 0 0 2px rgba(255, 255, 255, 0.1);
        }

        .phone-screen {
            background: #000000;
            border-radius: 2.5rem;
            overflow: hidden;
            position: relative;
        }

        /* Desktop Laptop Frame */
        @media (min-width: 1024px) {
            .laptop-frame {
                background: linear-gradient(145deg, #2a2a2a, #1a1a1a);
                border-radius: 1.5rem 1.5rem 0 0;
                padding: 2rem 3rem 0 3rem;
                box-shadow: 0 40px 80px rgba(0, 0, 0, 0.9),
                    inset 0 0 0 3px rgba(255, 255, 255, 0.08);
                position: relative;
            }

            .laptop-screen {
                background: #000000;
                border-radius: 0.75rem;
                overflow: hidden;
                border: 3px solid #1a1a1a;
            }

            .laptop-base {
                width: 120%;
                height: 2rem;
                background: linear-gradient(145deg, #2a2a2a, #1a1a1a);
                border-radius: 0 0 1.5rem 1.5rem;
                margin: 0 -10%;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.8);
                position: relative;
            }

            .laptop-notch {
                width: 35%;
                height: 0.5rem;
                background: #1a1a1a;
                border-radius: 0 0 0.5rem 0.5rem;
                position: absolute;
                top: 0;
                left: 50%;
                transform: translateX(-50%);
            }
        }

        .card-shadow {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }

        .profile-ring {
            box-shadow: 0 0 0 8px #000000, 0 0 40px rgba(0, 0, 0, 0.9);
        }

        .edit-icon-btn {
            position: absolute;
            bottom: 50%;
            left: 20px;
            transform: translateY(50%);
            z-index: 50;
        }

        @media (min-width: 768px) {
            .edit-icon-btn {
                left: 30px;
            }
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">

    <!-- Mobile View: Phone Frame (visible on mobile only) -->
    <div class="lg:hidden phone-frame w-full max-w-sm">
        <div class="phone-screen">
            <div class="p-6 pt-12 pb-16 min-h-screen">
                <!-- White Square (Top Left) -->
                <div class="absolute top-6 left-6 w-12 h-12 bg-white rounded-xl shadow-lg z-10"></div>

                <!-- Profile Image (Top Center) -->
                <div class="flex justify-center mb-8 relative z-20">
                    @if($card->profile_img_url)
                    <div class="w-36 h-36 rounded-full overflow-hidden profile-ring">
                        <img src="{{ asset($card->profile_img_url) }}"
                            alt="{{ $card->full_name }}"
                            class="w-full h-full object-cover">
                    </div>
                    @else
                    <div class="w-36 h-36 rounded-full bg-gradient-to-br from-gray-700 via-gray-800 to-gray-900 flex items-center justify-center profile-ring">
                        <span class="text-white text-5xl font-bold">
                            {{ substr($card->first_name, 0, 1) }}{{ substr($card->last_name, 0, 1) }}
                        </span>
                    </div>
                    @endif
                </div>

                <!-- White Card -->
                <div class="bg-white rounded-3xl card-shadow p-8 mb-6">
                    <h1 class="text-2xl font-bold text-black text-center mb-2">
                        {{ $card->full_name }}
                    </h1>

                    @if($card->job_title)
                    <p class="text-gray-500 text-center text-base mb-6">
                        {{ $card->job_title }}
                    </p>
                    @endif

                    <div class="border-t border-gray-300 my-6"></div>

                    @if($card->mobile_number)
                    <div class="text-center mb-6">
                        <p class="text-black text-lg font-medium">
                            {{ $card->mobile_number }}
                        </p>
                    </div>
                    <div class="border-t border-gray-300 my-6"></div>
                    @endif

                    @if($card->email)
                    <div class="text-center">
                        <p class="text-black text-base">
                            {{ $card->email }}
                        </p>
                    </div>
                    @endif
                </div>

                <!-- Add Contact Button -->
                <div class="relative">
                    <a href="{{ route('card.vcard', $card->public_slug) }}"
                        class="block w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold py-4 rounded-3xl shadow-xl text-center text-lg">
                        Add Contact
                    </a>

                    @auth
                    @if(auth()->user()->digitalCard && auth()->user()->digitalCard->id === $card->id)
                    <a href="{{ route('dashboard.edit') }}"
                        class="edit-icon-btn bg-white p-3 rounded-2xl shadow-2xl">
                        <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>

    {{-- Add this somewhere in your public card view --}}
    @auth
    @if(auth()->id() === $card->user_id)
    <div class="fixed top-4 right-4">
        <a href="{{ route('dashboard.edit') }}"
            class="bg-brand-orange text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition">
            Edit Card
        </a>
    </div>
    @endif
    @else
    <div class="fixed top-4 right-4">
        <a href="{{ route('card.edit.login', $card->public_slug) }}"
            class="bg-brand-orange text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition">
            Edit Card
        </a>
    </div>
    @endauth

    <!-- Desktop View: Laptop Frame (visible on desktop only) -->
    <div class="hidden lg:block w-full max-w-6xl">
        <div class="laptop-frame">
            <div class="laptop-screen" style="height: 600px;">
                <div class="h-full overflow-y-auto p-12 flex items-center justify-center">
                    <div class="w-full max-w-lg relative">
                        <!-- White Square (Top Left) -->
                        <div class="absolute -top-8 left-8 w-16 h-16 bg-white rounded-2xl shadow-xl z-10"></div>

                        <!-- Profile Image (Top Right) -->
                        <div class="absolute -top-16 right-8 z-20">
                            @if($card->profile_img_url)
                            <div class="w-44 h-44 rounded-full overflow-hidden profile-ring">
                                <img src="{{ asset($card->profile_img_url) }}"
                                    alt="{{ $card->full_name }}"
                                    class="w-full h-full object-cover">
                            </div>
                            @else
                            <div class="w-44 h-44 rounded-full bg-gradient-to-br from-gray-700 via-gray-800 to-gray-900 flex items-center justify-center profile-ring">
                                <span class="text-white text-6xl font-bold">
                                    {{ substr($card->first_name, 0, 1) }}{{ substr($card->last_name, 0, 1) }}
                                </span>
                            </div>
                            @endif
                        </div>

                        <!-- Main Card -->
                        <div class="relative pt-32">
                            <div class="bg-white rounded-[2.5rem] card-shadow pt-20 pb-16 px-12">
                                <h1 class="text-4xl font-bold text-black text-center mb-3">
                                    {{ $card->full_name }}
                                </h1>

                                @if($card->job_title)
                                <p class="text-gray-500 text-center text-xl mb-10">
                                    {{ $card->job_title }}
                                </p>
                                @endif

                                <div class="border-t border-gray-300 mb-10"></div>

                                @if($card->mobile_number)
                                <div class="text-center mb-10">
                                    <p class="text-black text-2xl font-medium">
                                        {{ $card->mobile_number }}
                                    </p>
                                </div>
                                <div class="border-t border-gray-300 mb-10"></div>
                                @endif

                                @if($card->email)
                                <div class="text-center">
                                    <p class="text-black text-xl">
                                        {{ $card->email }}
                                    </p>
                                </div>
                                @endif
                            </div>

                            <!-- Add Contact Button -->
                            <div class="mt-10 px-4 relative">
                                <a href="{{ route('card.vcard', $card->public_slug) }}"
                                    class="block w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold py-6 rounded-3xl shadow-xl text-center text-2xl hover:scale-[1.02] transition-all duration-300">
                                    Add Contact
                                </a>

                                @auth
                                @if(auth()->user()->digitalCard && auth()->user()->digitalCard->id === $card->id)
                                <a href="{{ route('dashboard.edit') }}"
                                    class="edit-icon-btn bg-white p-4 rounded-2xl shadow-2xl hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Laptop Base -->
        <div class="laptop-base">
            <div class="laptop-notch"></div>
        </div>
    </div>

</body>

</html>