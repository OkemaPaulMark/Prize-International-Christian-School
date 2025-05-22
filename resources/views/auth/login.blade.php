<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prize International School - Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        :root {
            --primary: #50c878;
            --primary-dark: #50c878;
            --secondary: #6c757d;
            --light: #f8f9fc;
            --white: #ffffff;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #e9f5ec 0%, #b2dfdb 100%);
            min-height: 94vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-card {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: none;
            width: 100%;
            max-width: 900px;
        }

        .login-left {
            background: linear-gradient(rgba(80, 200, 120, 0.85), rgba(80, 200, 120, 0.85)),
                        url('https://images.unsplash.com/photo-1571260899304-425eee4c7efc?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 3rem;
        }

        .login-left h2 {
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .login-left p {
            opacity: 0.9;
        }

        .login-right {
            padding: 2.5rem;
            background: var(--white);
        }

        .form-control {
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid #e3e6f0;
            width: 100%;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }

        .btn-login {
            background-color: var(--primary);
            border: none;
            padding: 0.75rem;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
            color: white;
            cursor: pointer;
        }

        .btn-login:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .footer {
            font-size: 0.85rem;
            color: var(--secondary);
            margin-top: 1rem;
            text-align: center;
        }

        .custom-checkbox {
            display: flex;
            align-items: center;
        }

        .custom-checkbox input {
            margin-right: 8px;
        }

        @media (max-width: 991.98px) {
            .login-left {
                display: none;
            }

            .login-right {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-lg-6 d-none d-lg-block login-left">
                        <div class="text-center">
                            <i class="fas fa-school fa-3x mb-3"></i>
                            <h2>Prize International School</h2>
                            <p>"Strive for Excellence"</p>
                            <p>Login now to be able to send feedbacks and give your views</p>
                        </div>
                    </div>

                    <div class="col-lg-6 login-right">
                        <div class="text-center mb-4">
                            <i class="fas fa-user-graduate fa-2x text-success mb-3"></i>
                            <h4 class="font-weight-bold">Welcome Back</h4>
                        </div>

                        @if(session('status'))
                            <div style="color: green; text-align: center; margin-bottom: 10px;">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif



                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email" class="small font-weight-bold">Email Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <div style="color: red; font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="small font-weight-bold">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                @error('password')
                                    <div style="color: red; font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between align-items-center">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember" class="small">Remember me</label>
                                </div>
                                <a href="{{ route('password.request') }}" class="small text-success">Forgot password?</a>
                            </div>

                            <button type="submit" class="btn-login mb-3">
                                <i class="fas fa-sign-in-alt mr-2"></i> Login
                            </button>

                            <div class="text-center small mt-3">
                                Don’t have an account?
                                <a href="{{ route('register') }}" class="text-success font-weight-bold">Sign up</a>
                            </div>
                        </form>

                        <div class="footer">
                            <p class="mb-0">© 2025 Prize International School. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
