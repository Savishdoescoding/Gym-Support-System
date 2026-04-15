<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gym Registration Form</title>
    <link rel="stylesheet" href="{{ asset('css/Register.css') }}">
</head>
<body>

<div class="container">
    <h2>Gym Registration</h2>

    <form method="POST" action="/register" id="registerForm">
        @csrf

        <label>Full Name</label>
        <input type="text" name="full_name" placeholder="Enter your name" value="{{ old('full_name') }}" required>
        @error('full_name')
            <small class="field-error">{{ $message }}</small>
        @enderror

        <label>Email</label>
        <div class="email-row">
            <input type="email" name="email" id="emailInput" placeholder="Enter your email" value="{{ old('email') }}" required>
            <button type="button" id="sendCodeBtn" onclick="sendCode()">Send Code</button>
        </div>
        @error('email')
            <small class="field-error">{{ $message }}</small>
        @enderror
        <small id="codeMessage" class="success-msg"></small>

        <label>Verification Code</label>
        <input type="text" name="verification_code" id="verificationCode" placeholder="Enter 6-digit code" required>
        <small id="codeError" class="field-error"></small>

        <label>Phone Number</label>
        <input type="tel" name="phone_number" placeholder="Enter your phone number" value="{{ old('phone_number') }}" required>
        @error('phone_number')
            <small class="field-error">{{ $message }}</small>
        @enderror

        <label>Age</label>
        <input type="number" name="age" placeholder="Enter your age" min="10" max="100" value="{{ old('age') }}" required>
        @error('age')
            <small class="field-error">{{ $message }}</small>
        @enderror

        <label>Gender</label>
        <div class="gender">
            <label><input type="radio" name="gender" value="Male"> Male</label>
            <label><input type="radio" name="gender" value="Female"> Female</label>
        </div>
        @error('gender')
            <small class="field-error">{{ $message }}</small>
        @enderror

        <label>Fitness Goal</label>
        <select name="fitness_goal">
            <option value="Weight Loss">Weight Loss</option>
            <option value="Muscle Gain">Muscle Gain</option>
            <option value="General Fitness">General Fitness</option>
        </select>
        @error('fitness_goal')
            <small class="field-error">{{ $message }}</small>
        @enderror

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter password" required>
        @error('password')
            <small class="field-error">{{ $message }}</small>
        @enderror

        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" placeholder="Confirm password" required>

        <button type="submit">Register</button>
    </form>
</div>

<script>
function sendCode() {
    const email = document.getElementById('emailInput').value;
    const btn = document.getElementById('sendCodeBtn');
    const msg = document.getElementById('codeMessage');

    if (!email) {
        msg.textContent = 'Please enter your email first.';
        msg.style.color = 'red';
        return;
    }

    btn.disabled = true;
    btn.textContent = 'Sending...';

    fetch('/send-verification-code', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: JSON.stringify({ email: email })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            msg.textContent = '✅ Code sent! Check your email.';
            msg.style.color = 'green';
        } else {
            msg.textContent = '❌ Failed to send code.';
            msg.style.color = 'red';
            btn.disabled = false;
            btn.textContent = 'Send Code';
        }
    })
    .catch(() => {
        msg.textContent = '❌ Something went wrong.';
        msg.style.color = 'red';
        btn.disabled = false;
        btn.textContent = 'Send Code';
    });
}
</script>

</body>
</html>
