<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $card->full_name }} - Digital Card</title>

    @vite(['resources/css/app.css'])

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #000;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .mobile-container {
            width: 375px;
            height: 812px;
            background-color: #000;
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 60px 20px 20px;
        }

        .header {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            padding: 60px 20px 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            z-index: 10;
        }

        .logo {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .logo-icon {
            background-color: #FF8000;
            color: #fff;
            padding: 4px 8px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 2px;
        }

        .logo-text {
            color: #fff;
            font-size: 10px;
            margin-top: 2px;
        }

        .elite-badge {
            color: #ccc;
            font-size: 16px;
            font-weight: 400;
        }

        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
            position: relative;
        }

        .contact-card {
            background-color: #EDEDED;
            border-radius: 24px 24px 32px 32px;
            padding: 70px 30px 40px;
            width: 100%;
            max-width: 280px;
            text-align: center;
            position: relative;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            animation: fadeIn 0.6s ease-out;
            margin-top: 40px;
        }

        /* Create the dip for profile picture */
        .contact-card::before {
            content: '';
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 80px;
            background-color: #EDEDED;
            border-radius: 0 0 60px 60px;
            z-index: 1;
        }

        .profile-picture {
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #000;
            z-index: 3;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .contact-info {
            margin-top: 30px;
            position: relative;
            z-index: 2;
        }

        .name {
            font-size: 24px;
            font-weight: bold;
            color: #000;
            margin-bottom: 8px;
        }

        .title {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
            font-weight: 400;
        }

        .separator {
            width: 70%;
            height: 1px;
            background-color: #B0B0B0;
            margin: 16px auto;
        }

        .phone,
        .email {
            font-size: 16px;
            color: #000;
            margin: 8px 0;
            font-weight: 500;
        }

        .phone {
            font-weight: bold;
        }

        .button-container {
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 30px 0 20px;
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
            border-radius: 20px;
            padding: 18px 0;
            font-size: 18px;
            font-weight: 600;
            width: 90%;
            box-shadow: 0 6px 20px rgba(255, 128, 0, 0.4);
            transition: all .2s ease;
        }

        .add-contact-btn:hover {
            background-color: #e6740d;
            transform: translateY(-2px);
        }

        .footer {
            position: absolute;
            bottom: 20px;
            left: 20px;
            z-index: 10;
        }

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
            width: 16px;
            height: 16px;
        }

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

        @media (max-width: 375px) {
            .mobile-container {
                width: 100%;
                padding: 60px 15px 15px;
            }

            .contact-card {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="mobile-container">

        <!-- HEADER -->
        <header class="header">
            <div class="logo">
                <div class="logo-icon">orange</div>
                <div class="logo-text">is here</div>
            </div>
            <div class="elite-badge">Elite+</div>
        </header>

        <!-- CONTENT -->
        <main class="main-content">
            <div class="contact-card">

                <!-- PROFILE IMAGE -->
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

        <!-- ADD CONTACT BUTTON -->
        <div class="button-container">
            <a href="{{ route('card.vcard', $card->public_slug) }}" class="add-contact-wrapper">
                <button class="add-contact-btn">
                    Add Contact
                </button>
            </a>
        </div>

        <!-- EDIT BUTTON -->
        <footer class="footer">
            @auth
            @if(auth()->id() === $card->user_id)
            <a href="{{ route('dashboard.edit') }}" class="edit-icon">
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