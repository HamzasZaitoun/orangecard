<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $card->full_name }} - Digital Card</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-brand-black min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Profile Image -->
            @if($card->profile_img_url)
            <div class="flex justify-center pt-8">
                <img src="{{ asset($card->profile_img_url) }}"
                    alt="{{ $card->full_name }}"
                    class="w-32 h-32 rounded-full object-cover border-4 border-brand-orange">
            </div>
            @else
            <div class="flex justify-center pt-8">
                <div class="w-32 h-32 rounded-full bg-brand-orange flex items-center justify-center">
                    <span class="text-white text-4xl font-bold">
                        {{ substr($card->first_name, 0, 1) }}{{ substr($card->last_name, 0, 1) }}
                    </span>
                </div>
            </div>
            @endif

            <!-- Card Details -->
            <div class="p-8 text-center">
                <h1 class="text-3xl font-bold text-brand-black mb-2">
                    {{ $card->full_name }}
                </h1>

                @if($card->job_title)
                <p class="text-brand-gray text-lg mb-6">
                    {{ $card->job_title }}
                </p>
                @endif

                <!-- Contact Information -->
                <div class="space-y-4 mb-8">
                    @if($card->email)
                    <a href="mailto:{{ $card->email }}"
                        class="flex items-center justify-center space-x-3 p-3 bg-brand-light rounded-lg hover:bg-brand-orange hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        <span>{{ $card->email }}</span>
                    </a>
                    @endif

                    @if($card->mobile_number)
                    <a href="tel:{{ $card->mobile_number }}"
                        class="flex items-center justify-center space-x-3 p-3 bg-brand-light rounded-lg hover:bg-brand-orange hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        <span>{{ $card->mobile_number }}</span>
                    </a>
                    @endif
                </div>

                <!-- Add to Contacts Button -->
                <a href="{{ route('card.vcard', $card->public_slug) }}"
                    class="block w-full bg-brand-orange text-white font-bold py-4 rounded-lg hover:bg-opacity-90 transition">
                    Add to Contacts
                </a>
            </div>
        </div>

        <!-- Branding -->
        <div class="text-center mt-6">
            <p class="text-brand-light text-sm">Powered by <span class="text-brand-orange font-bold">OrangeCard</span></p>
        </div>
    </div>
</body>

</html>