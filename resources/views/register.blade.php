<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    
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
                        <h4 class="fw-bold mb-2">Create Your Profile</h4>
                        <p class="text-muted">Start your internship journey with us</p>
                    </div>
                    
                    <form action="#" method="POST">
                        {{-- action="{{ route('register.post') }}" --}}
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="name" placeholder="What is your name?" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-lg" name="email" placeholder="Tell us your Email ID" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">University <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="university" placeholder="Your university name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-lg" name="password" placeholder="Create a strong password" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Re-enter your password" required>
                        </div>
                        
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label" for="terms">
                                I agree to the <a href="#" class="text-primary text-decoration-none">Terms & Conditions</a>
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                            Create Account
                        </button>
                        
                        <div class="text-center">
                            <span class="text-muted">Already have an account?</span>
                            <a href="{{ url('/login') }}" class="text-primary fw-semibold text-decoration-none ms-1">
                                Sign In
                            </a>
                        </div>
                    </form>
                    
                    <div class="d-flex align-items-center my-4">
                        <hr class="flex-grow-1">
                        <span class="px-3 text-muted small">OR</span>
                        <hr class="flex-grow-1">
                    </div>
                    
                    <button class="btn btn-outline-secondary btn-lg w-100 mb-2">
                        <i class="bi bi-google me-2"></i> Sign up with Google
                    </button>
                </div>
            </div>
            
        </div>
    </div>
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>