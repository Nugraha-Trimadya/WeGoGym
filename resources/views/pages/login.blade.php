@extends('homepages.homepage')

@section('content')
    <style>
        .login-container {
            margin-top: 80px; /* Adjust for fixed navbar */
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px); /* Full screen minus navbar */
            background-color: #f9f9f9;
        }

        .login-card {
            width: 40%;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            background-color: white;
        }

        .login-card h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .login-card form .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            padding: 10px 15px;
        }

        .login-card button {
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            width: 100%;
        }

        .login-card button:hover {
            background-color: #555;
        }

        .login-card .forgot-link {
            text-align: right;
            margin-top: -10px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .login-card .forgot-link a {
            color: #007bff;
            text-decoration: none;
        }

        .login-card .forgot-link a:hover {
            text-decoration: underline;
        }

        .login-card .register-link {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }

        .login-card .register-link a {
            color: #007bff;
            text-decoration: none;
        }

        .login-card .register-link a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="login-container">
        <div class="login-card">
            <h2 class="text-center">Welcome Back</h2>
            <p class="text-muted text-center">Please login to your account</p>
            @if (Session::get('success'))
                <div class="alert alert-success text-center">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::get('failed'))
                <div class="alert alert-danger text-center">
                    {{ Session::get('failed') }}
                </div>
            @endif
            <form action="{{ route('login.proses') }}" method="POST">
                @csrf
                <input type="email" name="email" class="form-control" placeholder="Email address" required>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <div class="forgot-link">
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit">Login</button>
            </form>
            <div class="register-link">
                <p>Don't have an account? <a href="">Sign up</a></p>
            </div>
        </div>
    </div>
@endsection
