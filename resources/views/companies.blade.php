@extends('master')

@section('title', 'Companies Page')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/companies.css') }}">
@endsection

@section('content')
<section class="companies-hero">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-5 fw-bold mb-3">Explore Your Companies</h1>
                <p class="lead mb-0">
                    Browse through hundreds of companies and read authentic reviews from students who have interned there.
                </p>
            </div>
        </div>
    </div>
</section>


<div class="bg-light py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="card shadow-sm border-0 filter-sidebar">
                    <div class="card-body">
                        <div class="mb-4">
                            <label class="form-label fw-semibold small">Search Company</label>
                            <input type="text" class="form-control" placeholder="Company name...">
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-semibold small">Internship Category</label>
                                <select class="form-select" name="category">
                                    <option selected>Software & IT</option>
                                    <option>Marketing & Sales</option>
                                    <option>Design & Creative</option>
                                    <option>Business & Finance</option>
                                    <option>Engineering</option>
                                    <option>Others</option>
                                </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold small">Location</label>
                            <select class="form-select">
                                <option selected>All Locations</option>
                                <option>Jakarta</option>
                                <option>Bandung</option>
                                <option>Surabaya</option>
                                <option>Yogyakarta</option>
                                <option>Bali</option>
                            </select>
                        </div>
                        <button class="btn btn-primary w-100 mb-2">
                            <i class="bi bi-funnel me-2"></i> Apply Filters
                        </button>
                        
                        <button class="btn btn-outline-secondary w-100">
                            <i class="bi bi-arrow-clockwise me-2"></i> Reset
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row g-4">
                    {{-- FOREACH DIMULAI DI SINI --}}
                    {{-- @foreach($companies as $company) --}}
                    
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body">
                                <div class="d-flex mb-3">
                                    <!-- Company Logo -->
                                    <div class="me-3">
                                        <div class="bg-light rounded p-2" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                                            <img src="" alt="Logo" class="img-fluid rounded">
                                            {{-- <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="img-fluid rounded"> --}}
                                        </div>
                                    </div>
                                    
                                    <!-- Company Info -->
                                    <div class="flex-grow-1">
                                        <h5 class="fw-bold mb-2">
                                            {{-- {{ $company->name }} --}}
                                            Apple Developer Academy
                                        </h5>
                                        <p class="text-muted small mb-2">
                                            <i class="bi bi-briefcase me-1"></i>
                                            {{-- {{ $company->industry }} --}}
                                            Software & IT
                                        </p>
                                        <p class="text-muted small mb-0">
                                            <i class="bi bi-geo-alt me-1"></i>
                                            {{-- {{ $company->location }} --}}
                                            Tangsel, Indonesia
                                        </p>
                                    </div>
                                    
                                    <!-- Rating -->
                                    <div class="text-center">
                                        <div class="badge bg-warning text-dark mb-1">
                                            <i class="bi bi-star-fill"></i> 4.5
                                        </div>
                                        <small class="text-muted d-block">0 reviews</small>
                                    </div>
                                </div>
                                
                                <p class="text-muted small mb-3">
                                    {{-- {{ Str::limit($company->description, 100) }} --}}
                                    Leading technology company specializing in digital solutions and innovation for businesses across Indonesia.
                                </p>
                                
                                <div class="d-flex gap-2 mb-3 flex-wrap">
                                    <span class="badge bg-light text-dark">50-100 employees</span>
                                </div>
                                
                                <a href="{{ url('/detail') }}" class="btn btn-outline-primary w-100">
                                    <i class="me-2"></i> View Details
                                </a>

                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                    {{-- FOREACH BERAKHIR DI SINI --}}
                </div>

                <!-- Pagination -->
                <nav class="mt-5">
                    <ul class="pagination justify-content-center">
                        {{-- {{ $companies->links() }} --}}
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection