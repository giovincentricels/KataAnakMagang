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
                        <form method="GET" action="{{ route('companies.index') }}">
                            <div class="mb-4">
                                <label class="form-label fw-semibold small">Search Company</label>
                                <input type="text" class="form-control" placeholder="Company name..." name="keyword" value="{{ request('keyword') }}">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold small">Internship Category</label>
                                <select class="form-select" name="category">
                                    <option value="">All Categories</option>
                                    @foreach([
                                        'Software & IT',
                                        'Marketing & Sales',
                                        'Design & Creative',
                                        'Business & Finance',
                                        'Engineering',
                                        'Others'
                                    ] as $category)
                                        <option value="{{ $category }}"
                                            {{ request('category') == $category ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold small">Location</label>
                                <select class="form-select">
                                    <option value="">All Locations</option>
                                    @foreach(['Jakarta','Bandung','Surabaya','Yogyakarta','Bali'] as $loc)
                                        <option value="{{ $loc }}"
                                            {{ request('location') == $loc ? 'selected' : '' }}>
                                            {{ $loc }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mb-2">
                                <i class="bi bi-funnel me-2"></i> Apply Filters
                            </button>

                            <a href="{{ route('companies.index') }}" class="btn btn-outline-secondary w-100">
                                <i class="bi bi-arrow-clockwise me-2"></i> Reset
                            </a>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row g-4">

                    @foreach($companies as $company)
                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <div class="me-3">
                                            <div class="bg-light rounded p-2" style="width:80px;height:80px">
                                                @if($company->logo)
                                                    <img src="{{ asset('storage/'.$company->logo) }}" class="img-fluid">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="flex-grow-1">
                                            <h5 class="fw-bold mb-2">{{ $company->name }}</h5>
                                            <p class="text-muted small mb-2">
                                                <i class="bi bi-briefcase me-1"></i> {{ $company->industry ?? '-' }}
                                            </p>
                                            <p class="text-muted small mb-0">
                                                <i class="bi bi-geo-alt me-1"></i> {{ $company->location ?? '-' }}
                                            </p>
                                        </div>

                                        <div class="text-center">
                                            <div class="badge bg-warning text-dark mb-1">
                                                <i class="bi bi-star-fill"></i>
                                                {{ number_format($company->average_rating, 1) }}
                                            </div>
                                            <small class="text-muted d-block">
                                                {{ $company->reviews_count }} reviews
                                            </small>
                                        </div>
                                    </div>

                                    <p class="text-muted small mb-3">
                                        {{ Str::limit($company->description, 100) }}
                                    </p>

                                    <div class="d-flex gap-2 mb-3 flex-wrap">
                                        <span class="badge bg-light text-dark">
                                            {{ $company->size }}
                                        </span>
                                    </div>

                                    <a href="{{ route('companies.show', $company) }}"
                                       class="btn btn-outline-primary w-100">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <nav class="mt-5">
                    <ul class="pagination justify-content-center">
                        {{ $companies->links('pagination::bootstrap-5') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
