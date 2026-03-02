<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Dashboard') - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tiny  -->
    <script src="https://cdn.tiny.cloud/1/zgft59l3e4az2xhrowkx25fm6oka2we9yu0az745lwos9p21/tinymce/6/tinymce.min.js"></script>

    <style>
        :root {
            --sidebar-width: 250px;
            --primary-color: #147146;
            --secondary-color: #165b36;
        }
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f6f9;
        }
        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: linear-gradient(135deg, #147146 0%, #1a8a5a 100%);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 100;
        }
        .sidebar .brand {
            padding: 20px;
            color: white;
            font-size: 1.3rem;
            font-weight: bold;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar .brand img {
            max-width: 180px;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.85);
            padding: 14px 20px;
            transition: all 0.3s;
            font-weight: 500;
            font-size: 14px;
        }
        .sidebar .nav-link:hover {
            color: white;
            background: rgba(255,255,255,0.1);
        }
        .sidebar .nav-link.active {
            color: #faff11;
            background: rgba(255,255,255,0.15);
            border-left: 3px solid #faff11;
        }
        .sidebar .nav-link i {
            width: 25px;
        }
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 25px;
        }
        .topbar {
            background: white;
            padding: 15px 25px;
            margin-bottom: 25px;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }
        .card-header {
            background: white;
            border-bottom: 1px solid #eee;
            font-weight: 600;
            color: #147146;
        }
        .table th {
            font-weight: 600;
            color: #147146;
            background: #f8f9fa;
        }
        .btn-primary {
            background: #147146;
            border-color: #147146;
        }
        .btn-primary:hover {
            background: #165b36;
            border-color: #165b36;
        }
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        .status-read {
            background: #d4edda;
            color: #147146;
        }
        .status-unread {
            background: #fff3cd;
            color: #856404;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="brand">
            <img src="{{ asset('frontend/images/logo.svg') }}" alt="WDB Fund" style="max-width: 180px;">
        </div>
        <nav class="mt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.team.*') ? 'active' : '' }}" href="{{ route('admin.team.index') }}">
                        <i class="fas fa-users"></i> Team Management
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.cms.*') ? 'active' : '' }}" href="{{ route('admin.cms.index') }}">
                        <i class="fas fa-file-alt"></i> CMS Pages
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}" href="{{ route('admin.contact.index') }}">
                        <i class="fas fa-envelope"></i> Contact Inquiries
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.change-password*') ? 'active' : '' }}" href="{{ route('admin.change-password') }}">
                        <i class="fas fa-key"></i> Change Password
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}" target="_blank">
                        <i class="fas fa-external-link-alt"></i> View Website
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link text-white bg-transparent border-0 w-100 text-start">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <div class="topbar d-flex justify-content-between align-items-center">
            <h5 class="mb-0" style="color: #147146; font-weight: 600;">@yield('title', 'Dashboard')</h5>
            <div class="d-flex align-items-center">
                <span class="me-3" style="color: #147146; font-weight: 500;">Welcome, {{ auth()->guard('admin')->user()->name }}</span>
                <img src="https://ui-avatars.com/api/?name={{ auth()->guard('admin')->user()->name }}&background=147146&color=fff" 
                     class="rounded-circle" width="40" height="40" alt="Avatar">
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 10px;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 10px;">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    
    @stack('styles')
    @stack('scripts')
</body>
</html>
