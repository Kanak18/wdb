<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login - WDB Entrepreneur Fund</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Montserrat', sans-serif;
            min-height: 100vh;
            display: flex;
        }
        .login-left {
            flex: 1;
            background: url('../frontend/images/banner_img.png') center/cover;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            min-height: 100vh;
        }
        .login-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(20, 113, 70, 0.9) 0%, rgba(21, 95, 54, 0.85) 100%);
        }
        .login-left-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            max-width: 400px;
        }
        .login-left-content img {
            max-width: 280px;
            width: 100%;
            margin-bottom: 30px;
        }
        .login-left-content h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.3;
        }
        .login-left-content p {
            font-size: 16px;
            font-weight: 300;
            opacity: 0.9;
            line-height: 1.6;
        }
        .login-right {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f6f6f6;
            padding: 40px;
            min-height: 100vh;
        }
        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.08);
            padding: 50px;
            width: 100%;
            max-width: 450px;
        }
        .brand {
            text-align: center;
            margin-bottom: 40px;
        }
        .brand h2 {
            color: #147146;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .brand p {
            color: #666;
            font-size: 14px;
        }
        .form-label {
            color: #147146;
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 10px;
            display: block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .mb-4 {
            margin-bottom: 22px !important;
        }
        .form-control {
            border-radius: 12px;
            padding: 16px 20px;
            border: 2px solid #e8e8e8;
            font-size: 15px;
            transition: all 0.3s ease;
            height: auto;
            background-color: #fefefe;
            color: #333;
        }
        .form-control::placeholder {
            color: #aaa;
            font-weight: 400;
        }
        .form-control:focus {
            border-color: #147146;
            box-shadow: 0 0 0 4px rgba(20, 113, 70, 0.15);
            background-color: #fff;
            outline: none;
        }
        .input-group {
            margin-bottom: 0;
            border-radius: 12px;
            overflow: hidden;
        }
        .input-group-text {
            background: #147146;
            border: 2px solid #147146;
            border-right: none;
            color: white;
            padding: 16px 14px;
            width: 50px;
            justify-content: center;
            font-size: 16px;
        }
        .input-group .form-control {
            border-left: none;
            border-radius: 0 12px 12px 0;
        }
        .input-group:focus-within .input-group-text {
            background: #165b36;
            border-color: #165b36;
        }
        .input-group:focus-within .form-control {
            border-color: #147146;
        }
        /* Remove default input-group styling conflicts */
        .input-group > .form-control {
            flex: 1;
        }
        .btn-login {
            background: #147146;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 16px;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(20, 113, 70, 0.3);
        }
        .btn-login:hover {
            background: #165b36;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(20, 113, 70, 0.4);
        }
        .back-link {
            text-align: center;
            margin-top: 25px;
        }
        .back-link a {
            color: #147146;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        .back-link a:hover {
            color: #faff11;
        }
        .alert-danger {
            background: #fee2e2;
            border: none;
            border-radius: 10px;
            color: #dc2626;
            padding: 15px;
            margin-bottom: 20px;
        }
        /* Mobile Header */
        .mobile-header {
            display: none;
            background: linear-gradient(135deg, #147146 0%, #1a8a5a 100%);
            padding: 25px 20px;
            text-align: center;
        }
        .mobile-header img {
            max-width: 180px;
        }
        @media (max-width: 991px) {
            body {
                flex-direction: column;
            }
            .login-left {
                display: none;
            }
            .mobile-header {
                display: block;
            }
            .login-right {
                flex: 1;
                background: linear-gradient(135deg, #147146 0%, #1a8a5a 100%);
                padding: 30px 20px;
                display: flex;
                align-items: flex-start;
                justify-content: center;
                padding-top: 40px;
            }
            .login-card {
                background: white;
                margin-top: 0;
                padding: 35px 30px;
            }
            .brand {
                margin-bottom: 30px;
            }
            .brand h2 {
                color: #147146;
            }
        }
        @media (max-width: 480px) {
            .login-card {
                padding: 25px 20px;
            }
            .brand h2 {
                font-size: 22px;
            }
            .brand p {
                font-size: 13px;
            }
            .mobile-header img {
                max-width: 150px;
            }
            .mobile-header {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Mobile Header -->
    <div class="mobile-header">
        <img src="{{ asset('frontend/images/logo.svg') }}" alt="WDB Entrepreneur Fund">
    </div>
    
    <div class="login-left">
        <div class="login-left-content">
            <img src="{{ asset('frontend/images/logo.svg') }}" alt="WDB Entrepreneur Fund">
            <h1>WDB Entrepreneur Fund</h1>
            <p>Admin Panel - Managing Small Business Funding in South Africa</p>
        </div>
    </div>
    
    <div class="login-right">
        <div class="login-card">
            <div class="brand">
                <h2>Welcome Back</h2>
                <p>Enter your credentials to access the admin panel</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required placeholder="Enter your password">
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt me-2"></i>&nbsp;Login to Dashboard
                    </button>
                </div>
            </form>

            <div class="back-link">
                <a href="{{ route('home') }}">
                    <i class="fas fa-arrow-left me-1"></i>Back to Website
                </a>
            </div>
        </div>
    </div>
</body>
</html>
