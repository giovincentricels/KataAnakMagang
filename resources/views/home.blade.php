@extends('master')

@section('title', 'Home Page')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 hero-content">


                <h1 class="hero-title">
                    By Interns, For Interns<br>
                    Towards a Better Career
                </h1>

                <p class="hero-description">
                    Get honest insights from students who have been there before you.</p>

                <div class="stats-container">
                    <div class="stat-item">
                        <div class="stat-number">
                            0<span class="unit">+</span>
                        </div>
                        <div class="stat-label">Internship Reviews</div>
                    </div>

                    <div class="stat-item">
                        <div class="stat-number">
                            0<span class="unit">+</span>
                        </div>
                        <div class="stat-label">Company Listed</div>
                    </div>

                    <div class="stat-item">
                        <div class="stat-number">
                            0<span class="unit">+</span>
                        </div>
                        <div class="stat-label">Student Users</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="search-card">
                    <h2>Intern Smarter With <span class="brand">KataAnakMagang</span></h2>

                    <form action="{{ route('companies.index') }}" method="GET" class="mt-4">
                        <div class="mb-3 position-relative">
                            <i class="bi bi-search search-icon"></i>
                            <input type="text" class="form-control search-input" name="keyword" placeholder="Search Internship...">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="form-label small text-muted mb-2">Internship Category</label>
                                <select class="form-select" name="category">
                                    <option selected>Software & IT</option>
                                    <option>Marketing & Sales</option>
                                    <option>Design & Creative</option>
                                    <option>Business & Finance</option>
                                    <option>Engineering</option>
                                    <option>Others</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-muted mb-2">Internship Type</label>
                                <select class="form-select" name="type">
                                    <option selected>All Type</option>
                                    <option>On-Site</option>
                                    <option>Hybrid</option>
                                    <option>Remote</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small text-muted mb-2">Location</label>
                            <input type="text" class="form-control" name="location" placeholder="e.g. Jakarta" required>
                        </div>

                        <button type="submit" class="btn btn-search">
                            <i class="bi bi-search"></i> Search Result
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="companies-section">
    <div class="container">
        <p class="companies-text">
            Join a growing network of companies and students building future careers together with <span class="brand">KataAnakMagang</span>
        </p>
    </div>
</section>


<section class="categories-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Explore Top Internship Jobs</h2>
            <p class="section-description">
                Browse internships by the most popular categories chosen by students.<br>
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="bi bi-file-text"></i>
                    </div>
                    <h5 class="category-title">Business & Finance</h5>
                    <p class="category-jobs">0 Active Interns</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="bi bi-phone"></i>
                    </div>
                    <h5 class="category-title">Software & IT</h5>
                    <p class="category-jobs">0 Active Interns</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="bi bi-gear-fill"></i>
                    </div>
                    <h5 class="category-title">Engineering</h5>
                    <p class="category-jobs">0 Active Interns</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="bi bi-palette-fill"></i>
                    </div>
                    <h5 class="category-title">Design & Creative</h5>
                    <p class="category-jobs">0 Active Interns</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="features-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="features-image">
                    <img src="{{ asset('image/student.png') }}" alt="Student Internship" class="img-fluid rounded-4">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="features-content">
                    <h2 class="features-title">Our Trusted & Popular Internship Portal</h2>
                    <p class="features-description">
                        KataAnakMagang is Indonesia's first student-driven internship review platform,
                        helping you make informed decisions about your career journey through authentic experiences.
                    </p>

                    <div class="feature-list">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <div class="feature-text">
                                <h5 class="feature-item-title">#1 Honest Reviews</h5>
                                <p class="feature-item-desc">
                                    Read authentic internship reviews from students who have experienced it firsthand,
                                    covering work culture, mentorship quality, and learning opportunities.
                                </p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <div class="feature-text">
                                <h5 class="feature-item-title">Top Companies</h5>
                                <p class="feature-item-desc">
                                    Discover internship opportunities from Indonesia's leading companies and
                                    startups, all rated and reviewed by fellow students.
                                </p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <div class="feature-text">
                                <h5 class="feature-item-title">Comprehensive Insights</h5>
                                <p class="feature-item-desc">
                                    Get detailed information about interview processes, salary ranges,
                                    work-life balance, and growth opportunities at various companies.
                                </p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <div class="feature-text">
                                <h5 class="feature-item-title">Free to Use</h5>
                                <p class="feature-item-desc">
                                    Access all reviews, company ratings, and internship insights completely free.
                                    Join our community and contribute your experience to help others.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
