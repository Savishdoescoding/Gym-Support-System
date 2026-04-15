<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gym Support System - Login</title>
    <link rel="stylesheet" href="{{ asset('css/userlogin.css') }}" />
</head>

<body>
    <div class="login-container">
        <h1>Log-In</h1>

        @if ($errors->any())
            <div class="error" role="alert">
                <strong>Login Failed:</strong> {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf

            <div class="input-group">
                <label for="email">EMAIL:</label>
                <input type="email"
                       id="email"
                       name="email"
                       placeholder="Enter Email"
                       value="{{ old('email') }}"
                       required
                       autofocus
                       aria-describedby="email-error" />
                @error('email')
                    <span id="email-error" class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <label for="password">PASSWORD:</label>
                <input type="password"
                       id="password"
                       name="password"
                       minlength="8"
                       maxlength="20"
                       placeholder="Enter Password"
                       required
                       aria-describedby="password-error" />
                @error('password')
                    <span id="password-error" class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="toggle-password">
                <input type="checkbox"
                       id="showPassword"
                       aria-label="Show password" />
                <label for="showPassword">Show Password</label>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>

    <script>
        document.getElementById('showPassword')?.addEventListener('change', function() {
            const pwd = document.getElementById('password');
            pwd.type = this.checked ? 'text' : 'password';
        });
    </script>

</body>
</html>
