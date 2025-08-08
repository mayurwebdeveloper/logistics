<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <!-- Left side - Login Form -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="card shadow-lg border-0" style="width: 100%; max-width: 400px;">
                    <div class="card-header admin-header text-center py-4">
                        <h3 class="mb-0">
                            <i class="fas fa-truck me-2"></i>
                            Admin Login
                        </h3>
                        <p class="mb-0 mt-2 opacity-75">Chavda Roadlines Management System</p>
                    </div>
                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

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

                        <form method="POST" action="{{ route('admin.login') }}" class="needs-validation" novalidate>
                            @csrf
                            
                            <div class="form-floating mb-3">
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       placeholder="name@example.com" 
                                       value="{{ old('email') }}" 
                                       required>
                                <label for="email">
                                    <i class="fas fa-envelope me-2"></i>Email Address
                                </label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       placeholder="Password" 
                                       required>
                                <label for="password">
                                    <i class="fas fa-lock me-2"></i>Password
                                </label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Sign In
                            </button>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3 bg-light">
                        <small class="text-muted">
                            <i class="fas fa-shield-alt me-1"></i>
                            Secure Admin Access
                        </small>
                    </div>
                </div>
            </div>

            <!-- Right side - Branding -->
            <div class="col-md-6 admin-header d-none d-md-flex align-items-center justify-content-center">
                <div class="text-center text-white">
                    <i class="fas fa-shipping-fast fa-5x mb-4 opacity-75"></i>
                    <h1 class="display-4 fw-bold mb-3">Chavda Roadlines</h1>
                    <p class="lead mb-4">Streamline your transportation operations with our comprehensive management system</p>
                    <div class="row text-center">
                        <div class="col-4">
                            <i class="fas fa-truck fa-2x mb-2"></i>
                            <p class="small">Fleet Management</p>
                        </div>
                        <div class="col-4">
                            <i class="fas fa-box fa-2x mb-2"></i>
                            <p class="small">Consignment Tracking</p>
                        </div>
                        <div class="col-4">
                            <i class="fas fa-file-invoice fa-2x mb-2"></i>
                            <p class="small">Invoice Generation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

