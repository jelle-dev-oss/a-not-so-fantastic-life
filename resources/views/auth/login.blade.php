<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Library Management System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f3f0e9;
            padding: 20px;
        }

        .login-container {
            display: flex;
            width: 850px;
            max-width: 100%;
            min-height: 500px;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }

        .login-left {
            width: 45%;
            background: #172b4d;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            text-align: center;
        }

        .login-left h1 {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .login-left p {
            color: #d5dce8;
            line-height: 1.6;
        }

        .book-icon {
            font-size: 65px;
            margin-bottom: 20px;
        }

        .login-right {
            width: 55%;
            padding: 55px 45px;
        }

        .login-right h2 {
            color: #172b4d;
            margin-bottom: 10px;
            font-size: 28px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 7px;
            outline: none;
            font-size: 14px;
        }

        input:focus {
            border-color: #172b4d;
        }

        button {
            width: 100%;
            padding: 14px;
            background: #172b4d;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #294675;
        }

        .register-link {
            text-align: center;
            margin-top: 22px;
            color: #666;
        }

        .register-link a {
            color: #172b4d;
            font-weight: bold;
            text-decoration: none;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 18px;
        }

        @media (max-width: 650px) {
            .login-container {
                flex-direction: column;
            }

            .login-left,
            .login-right {
                width: 100%;
            }

            .login-left {
                padding: 30px;
            }

            .login-right {
                padding: 35px 25px;
            }
        }
    </style>
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
            <div class="error" style="margin-bottom: 15px;">
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

</body>
</html>
