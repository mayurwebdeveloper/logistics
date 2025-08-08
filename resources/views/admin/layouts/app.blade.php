<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar sidebar-fixed bg-dark">
        <div class="sidebar-header p-3 border-bottom border-secondary">
            <h4 class="text-white mb-0">
                <i class="fas fa-truck me-2"></i>
                Logistics Admin
            </h4>
        </div>
        
        <ul class="nav flex-column p-3">
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
                   href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Dashboard
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.consignments.*') ? 'active' : '' }}" 
                   href="{{ route('admin.consignments.index') }}">
                    <i class="fas fa-box me-2"></i>
                    Consignments
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.trucks.*') ? 'active' : '' }}" 
                   href="{{ route('admin.trucks.index') }}">
                    <i class="fas fa-truck me-2"></i>
                    Trucks
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.consignors.*') ? 'active' : '' }}" 
                   href="{{ route('admin.consignors.index') }}">
                    <i class="fas fa-user-tie me-2"></i>
                    Consignors
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.consignees.*') ? 'active' : '' }}" 
                   href="{{ route('admin.consignees.index') }}">
                    <i class="fas fa-users me-2"></i>
                    Consignees
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.companies.*') ? 'active' : '' }}" 
                   href="{{ route('admin.companies.index') }}">
                    <i class="fas fa-building me-2"></i>
                    Companies
                </a>
            </li>
            
            <hr class="border-secondary">
            
            <li class="nav-item">
                <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-link border-0 bg-transparent text-start w-100" 
                            onclick="return confirm('Are you sure you want to logout?')">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
            <div class="container-fluid">
                <button class="btn btn-outline-secondary d-md-none" type="button" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="navbar-nav ms-auto">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" 
                           id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-2"></i>
                            {{ Auth::guard('admin')->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user me-2"></i>Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cog me-2"></i>Settings
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="content-wrapper p-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    @stack('scripts')
</body>
</html>

