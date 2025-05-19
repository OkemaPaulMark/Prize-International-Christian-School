<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My School - Register</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        :root {
            --primary: #198754;
            --primary-dark: #198754;
            --secondary: #6c757d;
            --light: #f8f9fa;
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
            background: linear-gradient(rgba(40, 167, 69, 0.85), rgba(40, 167, 69, 0.85)),
            url('https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
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
            border: 1px solid #ced4da;
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
                    <!-- Left Side -->
                    <div class="col-lg-6 d-none d-lg-block login-left">
                        <div class="text-center">
                            <i class="fas fa-school fa-3x mb-3"></i>
                            <h2>Prize International School</h2>
                            <p>"Strive for Excellence"</p>
                            <p>Register now to be part of our school and be able to give your views</p>
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="col-lg-6 login-right">
                        <div class="text-center mb-4">
                            <i class="fas fa-user-graduate fa-2x text-success mb-3"></i>
                            <h4 class="font-weight-bold">Create Your Account</h4>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="form-group">
                                <label for="name" class="small font-weight-bold">Full Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email" class="small font-weight-bold">Email Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password" class="small font-weight-bold">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label for="password_confirmation" class="small font-weight-bold">Confirm Password</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                                @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <button type="submit" class="btn btn-success btn-block btn-login mb-3">
                                Register
                            </button>

                            <div class="text-center small mt-3">
                                Already registered? 
                                <a href="{{ route('login') }}" class="text-success font-weight-bold">Login</a>
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
