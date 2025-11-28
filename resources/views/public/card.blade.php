<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $card->full_name }} - Digital Card</title>

    @vite(['resources/css/app.css'])

    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #000000;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Mobile Container */
        .mobile-container {
            width: 375px;
            height: 812px;
            background-color: #000000;
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 60px 20px 20px;
        }

        /* Header Section */
        .header {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            padding: 60px 20px 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .logo {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .logo-icon {
            background-color: #FF8000;
            color: white;
            padding: 4px 8px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 2px;
        }

        .logo-text {
            color: white;
            font-size: 10px;
            margin-top: 2px;
        }

        .elite-badge {
            color: white;
            font-size: 16px;
            font-weight: 500;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 40px 0;
            /* Added position relative for z-index context */
            position: relative;
        }

        /* Contact Card */
        .contact-card {
            background-color: #F7F7F7;
            border-radius: 20px;
            padding: 60px 30px 40px;
            width: 100%;
            max-width: 280px;
            text-align: center;
            position: relative;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.6s ease-out;
        }

        /* Profile Picture */
        .profile-picture {
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #F7F7F7;
            z-index: 2;
        }

        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Contact Information */
        .contact-info {
            margin-top: 20px;
        }

        .name {
            font-size: 24px;
            font-weight: bold;
            color: #000000;
            margin-bottom: 8px;
        }

        .title {
            font-size: 16px;
            color: #666666;
            margin-bottom: 20px;
        }

        .separator {
            width: 60%;
            height: 1px;
            background-color: #B0B0B0;
            margin: 16px auto;
        }

        .phone,
        .email {
            font-size: 16px;
            color: #000000;
            margin: 8px 0;
            font-weight: 500;
        }

        /* Button Container */
        .button-container {
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 20px 0;
        }

        .add-contact-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            text-decoration: none;
        }

        .add-contact-btn {
            background-color: #FF8000;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px 40px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            width: 90%;
            max-width: 200px;
            box-shadow: 0 4px 16px rgba(255, 128, 0, 0.3);
            transition: all 0.2s ease;
            animation: fadeIn 0.8s ease-out;
        }

        .add-contact-btn:hover {
            background-color: #e6740d;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(255, 128, 0, 0.4);
        }

        /* Footer */
        .footer {
            position: absolute;
            bottom: 20px;
            left: 20px;
            z-index: 10;
            /* Ensure it is above main content */
        }

        /* Using the 'edit-link' style from your original code for better visibility/interactivity */
        .edit-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .edit-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        .edit-icon {
            color: #ccc;
            /* Changed from 'white' to '#ccc' for consistency with original visual intent */
            width: 18px;
            height: 18px;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .mobile-container {
                width: 100%;
                height: 100vh;
                padding: 40px 16px 16px;
            }

            .contact-card {
                max-width: 100%;
                padding: 50px 20px 30px;
            }

            .name {
                font-size: 20px;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="mobile-container">

        <header class="header">
            <div class="logo">
                <div class="logo-icon">orange</div>
                <div class="logo-text">is here</div>
            </div>
            <div class="elite-badge">Elite+</div>
        </header>

        <main class="main-content">
            <div class="contact-card">

                <div class="profile-picture">
                    <img src="{{ asset($card->profile_img_url) }}"
                        alt="{{ $card->full_name }}"
                        class="profile-img">
                </div>

                <div class="contact-info">
                    <h1 class="name">{{ $card->full_name }}</h1>
                    <p class="title">{{ $card->job_title }}</p>

                    <div class="separator"></div>

                    <p class="phone">{{ $card->mobile_number }}</p>

                    <div class="separator"></div>

                    <p class="email">{{ $card->email }}</p>
                </div>

            </div>
        </main>

        <div class="button-container">
            <a href="{{ route('card.vcard', $card->public_slug) }}" class="add-contact-wrapper">
                <button class="add-contact-btn">
                    Add Contact
                </button>
            </a>
        </div>

        <footer class="footer">
            @auth
            @if(auth()->id() === $card->user_id)
            <a href="{{ route('dashboard.edit') }}" class="edit-link">
                <svg class="edit-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </a>
            @else
            <a href="{{ route('card.edit.login.form', $card->public_slug) }}" class="edit-link">
                <svg class="edit-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </a>
            @endif
            @else
            <a href="{{ route('card.edit.login.form', $card->public_slug) }}" class="edit-link">
                <svg class="edit-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </a>
            @endauth
        </footer>

    </div>

</body>

</html>