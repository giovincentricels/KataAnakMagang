<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

</head>
<body>
    <div class="container">
        <div class="auth-card">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h4 class="fw-bold mb-2">Sign In to Your Account</h4>
                        <p class="text-muted">Welcome back! Please enter your details.</p>
                    </div>
                    
                    <form action="#" method="POST">
                        {{-- action="{{ route('login.post') }}" --}}
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-lg" name="email" placeholder="Enter your email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-lg" name="password" placeholder="Enter your password" required>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                            <a href="#" class="text-decoration-none text-primary fw-semibold">
                                Forgot Password?
                            </a>
                        </div>
                        
                        <a href="{{ url('/') }}" class="btn btn-primary btn-lg w-100 mb-3">
                            Sign In
                        </a>

                        
                        <div class="text-center">
                            <span class="text-muted">Don't have an account?</span>
                            <a href="{{ url('/register') }}" class="text-primary fw-semibold text-decoration-none ms-1">
                                Register Now
                            </a>
                        </div>
                    </form>
                    
                    <div class="d-flex align-items-center my-4">
                        <hr class="flex-grow-1">
                        <span class="px-3 text-muted small">OR</span>
                        <hr class="flex-grow-1">
                    </div>
                    
                    <button class="btn btn-outline-secondary btn-lg w-100 mb-2">
                        <i class="bi bi-google me-2"></i> Continue with Google
                    </button>
                </div>
            </div>
            

        </div>
    </div>
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>