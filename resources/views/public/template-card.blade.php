<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }} - Digital Card</title>

    <meta name="description" content="Professional contact card with instant sharing">
    <meta property="og:title" content="{{ $user->name }} - Elite+ Contact Card">
    <meta property="og:description" content="Professional contact card with instant sharing">
    <meta property="og:type" content="website">

    @vite(['resources/css/app.css'])

    <style>
        :root {
            --background: 0 0% 0%;
            --foreground: 0 0% 100%;
            --card: 0 0% 97%;
            --card-foreground: 0 0% 10%;
            --primary: 30 100% 50%;
            --primary-foreground: 0 0% 100%;
            --secondary: 0 0% 20%;
            --muted: 0 0% 40%;
            --muted-foreground: 0 0% 70%;
            --border: 0 0% 85%;
            --logo-orange: 30 100% 50%;
        }

        .card-with-notch {
            background-image: url('{{ asset("card-background.png") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

        }

        /* Fallback */
        .bg-background {
            background-color: #000 !important;
        }

        .text-foreground {
            color: #fff !important;
        }

        .text-muted-foreground {
            color: #b3b3b3 !important;
        }

        .text-card-foreground {
            color: #1a1a1a !important;
        }

        .bg-primary {
            background-color: #ff8000 !important;
        }

        .text-primary-foreground {
            color: #fff !important;
        }

        .border-border {
            border-color: #d9d9d9 !important;
        }

        .border-card {
            border-color: #f7f7f7 !important;
        }

        .hover\:bg-primary\/90:hover {
            background-color: #e67300 !important;
        }

        .hover\:bg-secondary\/50:hover {
            background-color: rgba(51, 51, 51, .5) !important;
        }

        /* Profile image with dark gradient background */
        .profile-gradient {
            background: linear-gradient(135deg, #2d3748 0%, #1a202c 50%, #000000 100%);
        }
    </style>
</head>

<body class="bg-background text-foreground min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-sm">

        <!-- Header -->
        <div class="flex items-start justify-between mb-8">
            <img src="{{ asset('orange.png') }}" alt="Orange Logo" class="w-12 h-12 object-contain">
            <div class="text-muted-foreground text-sm font-light">Elite+</div>
        </div>

        <!-- Contact Card -->
        <div class="card-with-notch rounded-3xl p-8 shadow-2xl relative" style="margin-top: 5rem;">

            <!-- Profile Image (Using gradient circle with initial) -->
            <div class="flex justify-center -mt-20 mb-12" style="margin-top:-7rem">
                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-card shadow-lg profile-gradient flex items-center justify-center">
                    <span class="text-white text-5xl font-bold">
                        {{ substr($user->name, 0, 1) }}
                    </span>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="text-center space-y-4">
                <h1 class="text-2xl font-bold text-card-foreground">full name</h1>
                <p class="text-muted-foreground text-sm">job title</p>

                <div class="space-y-3 pt-2">
                    <div class="border-t border-border pt-3">
                        <p class="text-card-foreground font-medium">Phone Number</p>
                    </div>
                    <div class="border-t border-border pt-3">
                        <p class="text-card-foreground font-medium">user@example.com</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Contact (Disabled for template) -->
        <div class="mt-8 flex items-center gap-4">
            <button disabled
                class="flex-1 bg-gray-400 text-white rounded-xl h-14 text-base font-semibold shadow-lg cursor-not-allowed opacity-70">
                Add Contact
            </button>
        </div>

        <!-- Edit Button -->
        <div class="mt-8">
            <a href="{{ route('card.template.login', $user->id) }}"
                class="inline-flex h-12 w-12 rounded-xl hover:bg-secondary/50 items-center justify-center transition-all">
                <svg class="h-5 w-5 text-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </a>
        </div>

    </div>

</body>

</html>