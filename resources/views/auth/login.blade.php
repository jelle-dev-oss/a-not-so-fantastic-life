<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Library Management System</title>

    @vite('resources/css/style.css')
    
</head>

<body>

<div class="login-container">

    <div class="login-left">
        <h1>Library Management System</h1>
        <p>
            Discover, organize, and manage your library
            resources in one convenient place.
        </p>
    </div>

    <div class="login-right">

        <h2>Welcome Back!</h2>
        <p class="subtitle">Please log in to your account.</p>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error" id="login-error" style="margin-bottom: 15px;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

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
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >
            </div>

            <button type="submit">Login</button>
        </form>

        <div class="register-link">
            Don't have an account?
            <a href="{{ route('register') }}">Register here</a>
        </div>

    </div>
</div>

<script>
    const errorMessage = document.getElementById('login-error');

    if (errorMessage) {
        const match = errorMessage.textContent.match(/(\d+)\s+seconds?/i);

        if (match) {
            let seconds = parseInt(match[1]);

            const countdown = setInterval(function () {
                seconds--;

                if (seconds <= 0) {
                    clearInterval(countdown);

                    errorMessage.textContent =
                        'You can try logging in again now.';
                    return;
                }

                errorMessage.textContent =
                    errorMessage.textContent.replace(
                        /\d+\s+seconds?/i,
                        seconds + ' seconds'
                    );

            }, 1000);
        }
    }
</script>

</body>
</html>
