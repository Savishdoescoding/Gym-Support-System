<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gym Support System - Register</title>
    <link rel="stylesheet" href="{{ asset('css/userlogin.css') }}" />
    <style>
        .form-container {
            max-height: 85vh;
            overflow-y: auto;
        }

        .form-row-2col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        @media (max-width: 600px) {
            .form-row-2col {
                grid-template-columns: 1fr;
            }
        }

        .form-container::-webkit-scrollbar {
            width: 6px;
        }

        .form-container::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .form-container::-webkit-scrollbar-thumb {
            background: rgba(125, 211, 252, 0.4);
            border-radius: 3px;
        }

        .form-container::-webkit-scrollbar-thumb:hover {
            background: rgba(125, 211, 252, 0.6);
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link a {
            color: #38bdf8;
            text-decoration: none;
        }

        .login-link a:hover {
            color: #7dd3fc;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="form-container">
            <h1>Create Account</h1>

            @if ($errors->any())
                <div class="error" role="alert">
                    <strong>Registration Failed:</strong>
                    <ul style="margin: 8px 0 0 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li style="font-size: 0.9rem;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}" novalidate>
                @csrf

                <!-- Full Name -->
                <div class="input-group">
                    <label for="name">FULL NAME:</label>
                    <input type="text"
                           id="name"
                           name="name"
                           placeholder="Enter Full Name"
                           value="{{ old('name') }}"
                           required
                           autofocus />
                    @error('name')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Age and Phone Number -->
                <div class="form-row-2col">
                    <div class="input-group">
                        <label for="age">AGE:</label>
                        <input type="number"
                               id="age"
                               name="age"
                               placeholder="Enter Age"
                               value="{{ old('age') }}"
                               min="13"
                               max="120" />
                        @error('age')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="phone_number">PHONE NUMBER:</label>
                        <input type="tel"
                               id="phone_number"
                               name="phone_number"
                               placeholder="Enter Phone Number"
                               value="{{ old('phone_number') }}" />
                        @error('phone_number')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="input-group">
                    <label for="email">EMAIL:</label>
                    <input type="email"
                           id="email"
                           name="email"
                           placeholder="Enter Email"
                           value="{{ old('email') }}"
                           required />
                    @error('email')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Username -->
                <div class="input-group">
                    <label for="username">USERNAME:</label>
                    <input type="text"
                           id="username"
                           name="username"
                           placeholder="Enter Username"
                           value="{{ old('username') }}" />
                    @error('username')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Address -->
                <div class="input-group">
                    <label for="address">ADDRESS:</label>
                    <input type="text"
                           id="address"
                           name="address"
                           placeholder="Enter Address"
                           value="{{ old('address') }}" />
                    @error('address')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Height and Weight -->
                <div class="form-row-2col">
                    <div class="input-group">
                        <label for="height">HEIGHT (cm):</label>
                        <input type="number"
                               id="height"
                               name="height"
                               placeholder="Enter Height in cm"
                               value="{{ old('height') }}"
                               step="0.1"
                               min="100"
                               max="250" />
                        @error('height')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="weight">WEIGHT (kg):</label>
                        <input type="number"
                               id="weight"
                               name="weight"
                               placeholder="Enter Weight in kg"
                               value="{{ old('weight') }}"
                               step="0.1"
                               min="20"
                               max="300" />
                        @error('weight')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Body Type -->
                <div class="input-group">
                    <label for="body_type">BODY TYPE:</label>
                    <select id="body_type" name="body_type">
                        <option value="">Select Body Type</option>
                        <option value="ectomorph" {{ old('body_type') == 'ectomorph' ? 'selected' : '' }}>Ectomorph (Lean)</option>
                        <option value="mesomorph" {{ old('body_type') == 'mesomorph' ? 'selected' : '' }}>Mesomorph (Athletic)</option>
                        <option value="endomorph" {{ old('body_type') == 'endomorph' ? 'selected' : '' }}>Endomorph (Curvy)</option>
                        <option value="other" {{ old('body_type') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('body_type')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="input-group">
                    <label for="password">PASSWORD:</label>
                    <input type="password"
                           id="password"
                           name="password"
                           minlength="8"
                           maxlength="20"
                           placeholder="Enter Password (8-20 characters)"
                           required />
                    @error('password')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="input-group">
                    <label for="password_confirmation">CONFIRM PASSWORD:</label>
                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           minlength="8"
                           maxlength="20"
                           placeholder="Confirm Password"
                           required />
                    @error('password_confirmation')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="toggle-password">
                    <input type="checkbox" id="showPassword" aria-label="Show password" />
                    <label for="showPassword">Show Password</label>
                </div>

                <button type="submit" class="login-btn" style="margin-top: 15px;">Create Account</button>

                <div class="login-link">
                    Already have an account? <a href="{{ route('login') }}">Login here</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showPasswordCheckbox = document.getElementById('showPassword');
            const passwordInput = document.getElementById('password');
            const passwordConfirmInput = document.getElementById('password_confirmation');

            if (showPasswordCheckbox) {
                showPasswordCheckbox.addEventListener('change', function() {
                    if (passwordInput) passwordInput.type = this.checked ? 'text' : 'password';
                    if (passwordConfirmInput) passwordConfirmInput.type = this.checked ? 'text' : 'password';
                });
            }
        });
    </script>



</body>
</html>
