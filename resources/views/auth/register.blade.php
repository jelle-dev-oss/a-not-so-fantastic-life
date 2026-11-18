<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Library Management System</title>

    @vite('resources/css/style.css')
    
</head>

<body>

<div class="register-container">

    <div class="register-left">
        <h1>Join Our Library</h1>
        <p>
            Create your account and enjoy a convenient
            library management experience.
        </p>
    </div>

    <div class="register-right">

        <h2>Create Account</h2>
        <p class="subtitle">Fill in the details to get started.</p>

        <form action="{{ route('register.post') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter your full name"
                    required
                >
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    required
                >
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="At least 8 characters"
                    required
                >
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">
                    Confirm Password
                </label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Confirm your password"
                    required
                >
            </div>

            <button type="submit">Create Account</button>
        </form>

        <div class="login-link">
            Already have an account?
            <a href="{{ route('login') }}">Login here</a>
        </div>

    </div>
</div>

</body>
</html>
