<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gym Support System</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
    <div class="login-container">
        <h1>Log-In</h1>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <label for="email">EMAIL:</label>
                <input type="email"
                       id="email"
                       name="email"
                       placeholder="Enter Email"
                       value="{{ old('email') }}"
                       required />
            </div>

            <div class="input-group">
                <label for="password">PASSWORD:</label>
                <input type="password"
                       id="password"
                       name="password"
                       minlength="8"
                       maxlength="20"
                       placeholder="Enter Password"
                       required />
            </div>

            <div class="toggle-password">
                <input type="checkbox"
                       onclick="togglePassword()"
                       id="showPassword" />
                <label for="showPassword">Show Password</label>
            </div>

            <input type="submit" value="Login" />
        </form>
    </div>

    <script>
        function togglePassword() {
            const pwd = document.getElementById('password');
            pwd.type = pwd.type === 'password' ? 'text' : 'password';
        }
    </script>

</body>
</html>
