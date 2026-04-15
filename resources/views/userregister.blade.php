<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gym Support System - Register</title>
    <link rel="stylesheet" href="{{ asset('css/userlogin.css') }}" />
</head>

<body>
    <div class="login-container">
        <h1>Create Account</h1>

        @if ($errors->any())
            <div class="error" role="alert">
                <strong>Registration Failed:</strong> {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}" novalidate>
            @csrf

            <div class="input-group">
                <label for="name">FULL NAME:</label>
                <input type="text"
                       id="name"
                       name="name"
                       placeholder="Enter Full Name"
                       value="{{ old('name') }}"
                       required
                       autofocus
                       aria-describedby="name-error" />
                @error('name')
                    <span id="name-error" class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <label for="email">EMAIL:</label>
                <input type="email"
                       id="email"
                       name="email"
                       placeholder="Enter Email"
                       value="{{ old('email') }}"
                       required
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
                       placeholder="Enter Password (8-20 characters)"
                       required
                       aria-describedby="password-error" />
                @error('password')
                    <span id="password-error" class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <label for="password_confirmation">CONFIRM PASSWORD:</label>
                <input type="password"
                       id="password_confirmation"
                       name="password_confirmation"
                       minlength="8"
                       maxlength="20"
                       placeholder="Confirm Password"
                       required
                       aria-describedby="password_confirmation-error" />
                @error('password_confirmation')
                    <span id="password_confirmation-error" class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="toggle-password">
                <input type="checkbox"
                       id="showPassword"
                       aria-label="Show password" />
                <label for="showPassword">Show Password</label>
            </div>

            <button type="submit" class="login-btn">Create Account</button>

            <p style="text-align: center; margin-top: 15px; font-size: 14px;">
                Already have an account? <a href="{{ route('login') }}" style="color: #007bff; text-decoration: none;">Login here</a>
            </p>
        </form>
    </div>

    <script>
        document.getElementById('showPassword')?.addEventListener('change', function() {
            const pwd = document.getElementById('password');
            const pwdConfirm = document.getElementById('password_confirmation');
            pwd.type = this.checked ? 'text' : 'password';
            pwdConfirm.type = this.checked ? 'text' : 'password';
        });
    </script>

</body>
</html>
