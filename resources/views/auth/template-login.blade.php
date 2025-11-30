<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ $user->name }}</title>
    @vite(['resources/css/app.css'])

    <style>
        body {
            background-color: #e5e5e5;
        }

        .login-container {
            background-color: #e5e5e5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .login-box {
            background-color: #e5e5e5;
            width: 100%;
            max-width: 350px;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 4rem;
        }

        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .logo-text {
            color: #000;
            font-size: 0.75rem;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .elite-logo {
            width: 80px;
            height: auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            color: #666;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 1rem;
            background-color: #d1d1d1;
            border: none;
            border-radius: 1.5rem;
            color: #000;
            font-size: 0.875rem;
            outline: none;
        }

        .form-input::placeholder {
            color: #999;
        }

        .form-input:focus {
            background-color: #c5c5c5;
        }

        .login-button {
            width: 100%;
            padding: 1rem;
            background-color: #4a4a4a;
            color: #fff;
            border: none;
            border-radius: 0.75rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .login-button:hover {
            background-color: #3a3a3a;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-box">

            <!-- Header -->
            <div class="header-section">
                <div class="logo-container">
                    <img src="{{ asset('orange.png') }}" alt="Orange Logo" class="w-24 h-24 object-contain">
                    <!-- <span class="logo-text">is here</span> -->
                </div>
                <img src="{{ asset('elite-plus-logo.png') }}" alt="Elite+" class="elite-logo">
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('card.template.login.post', $user->id) }}">
                @csrf

                <!-- Username (prefilled, readonly) -->
                <div class="form-group">
                    <label class="form-label">User Name</label>
                    <input type="text" value="{{ $user->username }}" readonly class="form-input"
                        style="cursor: not-allowed; opacity: 0.8;">
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" required autofocus class="form-input" placeholder="">
                    @error('password')
                        <p style="margin-top: 0.5rem; font-size: 0.75rem; color: #ef4444;">{{ $message }}</p>
                    @enderror
                    @error('email')
                        <p style="margin-top: 0.5rem; font-size: 0.75rem; color: #ef4444;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Hidden email field -->
                <input type="hidden" name="email" value="{{ $user->email }}">

                <!-- Submit Button -->
                <div class="button-container">
                    <button type="submit" class="login-button">
                        Login
                    </button>
                </div>
            </form>

        </div>
    </div>
</body>

</html>