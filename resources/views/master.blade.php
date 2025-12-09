<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KataAnakMagang')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    

<link rel="stylesheet" href="{{ asset('css/master.css') }}">
@yield('styles')

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('image/logo2.png') }}" alt="Logo" height="40">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/communities') }}">Communities</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/companies') }}">Companies</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/salaries') }}">Salaries</a></li>
            </ul>

            <!-- Profile Icon Kalau udah login -->
            <a href="{{ url('/profile') }}" class="text-white text-decoration-none">
                <i class="bi bi-person-circle profile-icon me-3"></i>
            </a>

            <!-- Kalau belum login tampilin cuma sign in dan register ini -->
            <div class="d-flex gap-2">
                <a href="{{ url('/login') }}" class="btn btn-signin">
                    <i class="bi bi-box-arrow-in-right"></i> Sign In
                </a>
                <a href="{{ url('/register') }}" class="btn btn-register">
                    <i class="bi bi-person-plus"></i> Register Today
                </a>
            </div>

            

        </div>
    </div>
</nav>
    
<main>
    @yield('content')
</main>

<script>
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    });
</script>
    
<footer class="footer mt-5 py-5 text-white">
    <div class="container">
        <div class="row">
            
            <div class="col-md-3 mb-4">
            <img src="{{ asset('image/logo2.png') }}" alt="Logo" height="45">
                <p class="small text-light mt-2">By Interns, For Interns</p>

                <div class="d-flex gap-3 mt-3 social-icons">
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Explore</h6>
                <ul class="footer-list small">
                    <li><a href="{{ url('/communities') }}" class="footer-link">Communities</a></li>
                    <li><a href="{{ url('/companies') }}" class="footer-link">Companies</a></li>
                    <li><a href="{{ url('/salaries') }}" class="footer-link">Salaries</a></li>
                </ul>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Support</h6>
                <ul class="footer-list small">
                    <li><a href="#" class="footer-link">Contact Us</a></li>
                    <li><a href="#" class="footer-link">Help / FAQ</a></li>
                    <li><a href="#" class="footer-link">Terms of Use</a></li>
                </ul>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Download the App</h6>
                <div class="d-flex mt-3 gap-3">
                    <a href="#" class="app-icon"><i class="bi bi-google-play"></i></a>
                    <a href="#" class="app-icon"><i class="bi bi-apple"></i></a>
                </div>
            </div>

        </div>

        <div class="footer-bottom mt-4">
            <p class="mb-0 small">© 2025 KataAnakMagang. All Rights Reserved.</p>
        </div>
    </div>
</footer>
  
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>